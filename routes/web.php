<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;

Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/sign-in', [PageController::class, 'signIn'])->name('sign_in');
Route::get('/registration', [PageController::class, 'registration'])->name('registration');

// Needs authentication
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/pipelines', [PageController::class, 'pipelines'])->name('pipelines_page');
Route::get('/leads', [PageController::class, 'leads'])->name('leads');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contact_page');
Route::get('/tasks', [PageController::class, 'tasks'])->name('tasks');
Route::get('/admin/users', [PageController::class, 'adminAccessUser'])->name('admin_access_user');

// Landing page
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('landing_page');
