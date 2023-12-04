<?php

namespace App\Http\Controllers;
use Socialite;
use App\Models\User;
use Auth;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                try {
                    $new_user = User::create([
                        'name' => $google_user->getName(),
                        'email' => $google_user->getEmail(),
                        'google_id' => $google_user->getId(),
                        'role' => 5, // Set the default role value here
                    ]);

                    Auth::login($new_user);
                } catch (QueryException $ex) {
                    // Check if the error is a duplicate email entry
                    if (str_contains($ex->getMessage(), 'Duplicate entry')) {
                        // Email is already in the database, attempt login
                        $existingUser = User::where('email', $google_user->getEmail())->first();
                        if ($existingUser) {
                            Auth::login($existingUser);
                            return redirect()->intended('client');
                        }
                    }

                    // Handle other database-related errors
                    dd('User creation error: ' . $ex->getMessage());
                }
            } else {
                Auth::login($user);
            }

            return redirect()->intended('client');
        } catch (\Throwable $th) {
            dd('Something went wrong: ' . $th->getMessage());
        }
    }
}
