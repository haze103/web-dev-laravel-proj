<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaskController;

// Public routes
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Page views
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/pipelines', [PageController::class, 'pipelines'])->name('pipelines_page');
    Route::get('/leads', [PageController::class, 'leads'])->name('leads');
    Route::get('/contacts', [PageController::class, 'contacts'])->name('contact_page');
    Route::get('/tasks', [PageController::class, 'tasks'])->name('tasks');

    // USERS (Display view from UserController with $users data)
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin_access_user');

    // UserController CRUD routes
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // LeadController CRUD routes
    Route::post('/api/create/lead', [LeadController::class, 'store'])->name('lead.store');
    Route::get('/api/edit/lead/{lead}', [LeadController::class, 'edit'])->name('lead.edit');
    Route::put('/api/update/lead/{lead}', [LeadController::class, 'update'])->name('lead.update');
    Route::delete('/api/delete/lead/{lead}', [LeadController::class, 'destroy'])->name('lead.destroy');

    // ContactController CRUD routes
    Route::post('/api/create/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/api/edit/contact/{contact}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/api/update/contact/{contact}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('/api/delete/contact/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
    
    // TaskController CRUD routes
    Route::post('/api/create/task', [TaskController::class, 'store'])->name('task.store');
    Route::get('/api/edit/task/{task}', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/api/update/task/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/api/delete/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
});

// Authentication routes
Auth::routes();

// Landing Page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('landing_page');