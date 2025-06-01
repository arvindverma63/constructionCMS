<?php

use App\Http\Controllers\AdminControllers\ContractorController;
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

Route::get('/login', [PageController::class, 'login'])->name('login');
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


// User-only routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserPageController::class, 'userAdminDashboard'])->name('user.dashboard');
});

Route::get('/', function () {
    return view('userAdmin.home');
})->name('admin');

Route::get('/services', function () {
    return view('userAdmin.services');
})->name('services');

Route::get('/properties', function () {
    return view('userAdmin.properties');
})->name('properties');

Route::get('/favorites', function () {
    return view('userAdmin.favorites');
})->name('favorites');
