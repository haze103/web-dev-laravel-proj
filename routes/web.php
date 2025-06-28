<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

// 🔓 Public routes
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// 🔐 Authenticated routes
Route::middleware('auth')->group(function () {
    // 🌐 Page views
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/pipelines', [PageController::class, 'pipelines'])->name('pipelines_page');
    Route::get('/leads', [PageController::class, 'leads'])->name('leads');
    Route::get('/contacts', [PageController::class, 'contacts'])->name('contact_page');
    Route::get('/tasks', [PageController::class, 'tasks'])->name('tasks');

    // ✅ USERS (Display view from UserController with $users data)
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin_access_user');

    // ✅ UserController CRUD routes
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

// 🔑 Authentication routes
Auth::routes();

// 🏠 Landing Page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('landing_page');
