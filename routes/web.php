<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserControllers\UserPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('website.welcome');
})->name('home');

Route::get('/login',[PageController::class,'login'])->name('login');
Route::get('/about', [PageController::class, 'aboutPage'])->name('about');
Route::get('/services', [PageController::class, 'servicesPage'])->name('services');
Route::get('/projects', [PageController::class, 'projectsPage'])->name('projects');
Route::get('/contact', [PageController::class, 'contactPage'])->name('contact');

Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::get('/properties', [PageController::class, 'listProperties'])->name('properties');

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

// Routes for authenticated users with any role
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'userAdminDashboard'])->name('userAdmin');
});

// Admin-only routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [PageController::class, 'adminDashboard'])->name('admin.dashboard');
});

// User-only routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserPageController::class, 'userAdminDashboard'])->name('user.dashboard');
});
