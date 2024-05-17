<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Jobs\SendUserVerificationMail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/',[PageController::class, 'index'])->name('index');

Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::post('login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/email/verify', function () {
    return view('auth.verify-email', ['user_email' => Auth::user()->email]);
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware('auth','signed')->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request){
    SendUserVerificationMail::dispatch($request->user()->sendEmailVerificationNotification());
    flash()->success('Email verification link sent.');
    return redirect()->back();
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/customize', [DashboardController::class, 'customize'])->name('dashboard.customize');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
})->middleware(['auth', 'verified']);

Route::get('/{profile_name}', [PageController::class, 'getProfile'])->where('profile_name', '[a-zA-Z0-9_-]+')->name('profile');
Route::post('/{profile_name}', [PageController::class, 'postProfile'])->where('profile_name', '[a-zA-Z0-9_-]+')->name('profile.post');


