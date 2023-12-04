<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminClientController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminBookingController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OTPVerificationController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');


//admin
Route::get('admin', [AdminClientController::class, 'index'])->name('admin.dashboard')->middleware('admin');
Route::get('/admin/users', [AdminClientController::class, 'userindex'])->name('admin.userindex')->middleware('admin');
Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('movies', [MovieController::class, 'index'])->name('admin.movies.index');
        Route::get('movies/create', [MovieController::class, 'create'])->name('admin.movies.create');
        Route::post('movies', [MovieController::class, 'store'])->name('admin.movies.store');
        Route::get('movies/{movie}/edit', [MovieController::class, 'edit'])->name('admin.movies.edit');
        Route::put('movies/{movie}', [MovieController::class, 'update'])->name('admin.movies.update');
        Route::delete('movies/{movie}', [MovieController::class, 'destroy'])->name('admin.movies.destroy');
    });
});

Route::middleware('admin')->group(function () {
    Route::prefix('admin')->group(function () {
    Route::get('rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('rooms', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');
});
});



Route::middleware('admin')->group(function () {
    Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
});



Route::middleware('admin')->group(function () {

    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
    Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
    Route::get('/schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
    Route::put('/schedules/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');
    Route::delete('/schedules/{schedule}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');
});



Route::group(['middleware' => 'client'], function () {
    Route::get('client', [CustomerController::class, 'index'])->name('client');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    // Delete the specified booking
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});

//google
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);


Route::get('/verify-otp', [OTPVerificationController::class, 'showOTPVerificationForm'])->name('verify-otp');
Route::post('verify-otp', [OTPVerificationController::class, 'verifyOTP']);

Auth::routes();
