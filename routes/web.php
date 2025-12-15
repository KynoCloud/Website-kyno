<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

// Dashboard accessible to normal users
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// Admin + Staff + Superadmin + System + Developer
Route::middleware(['auth', 'role:admin|staff|superadmin|system|developer'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return Inertia::render('AdminDashboard');
    })->name('admin.dashboard');
});

// System + Superadmin + Developer only
Route::middleware(['auth', 'role:system|superadmin|developer'])->group(function () {
    Route::get('/system', function () {
        return Inertia::render('SystemDashboard');
    })->name('system.dashboard');
});

require __DIR__.'/auth.php';
