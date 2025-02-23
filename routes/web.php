<?php

use App\Http\Controllers\LoginController;
use App\Http\Middleware\EnsureUserIsAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware(EnsureUserIsAuthenticated::class);

Route::post(
    '/authenticate',
    [LoginController::class, 'authenticate']
)->name('authenticate');

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get("/", function () {
        return view('dashboard.home');
    })->name("home");
});
