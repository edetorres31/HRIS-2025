<?php

use App\Enums\UserRole;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    
    Route::post(
        '/authenticate', [LoginController::class, 'authenticate']
    )->name('authenticate');
});


Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get("/", function () {
        $role = Auth::user()->role;

        return match ($role) {
            UserRole::EMPLOYEE => view('employee.dashboard'),
            UserRole::HR => view('hr.dashboard'),
            UserRole::ADMIN => view('admin.dashboard'),
            default => abort(403),
        };
    })->name("dashboard");

    Route::get("/attendance", function () {
        return view('attendance.index');
    })->name("attendance");

    Route::get("/logout", [LoginController::class, 'logout'])->name("logout");
});