<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminClientController extends Controller
{
    /**
     * Show the admin view.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('admin.admin');
    }

    public function userindex()
    {
        $users = User::where('role', 5)->paginate(10); // Assuming you want 10 users per page
        return view('admin.users.index', compact('users'));
    }

}
