<?php

use App\Http\Controllers\PageController;
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

Route::get('/about',[PageController::class,'aboutPage'])->name('about');
Route::get('/services',[PageController::class,'servicesPage'])->name('services');
Route::get('/projects',[PageController::class,'projectsPage'])->name('projects');
Route::get('/contact',[PageController::class,'contactPage'])->name('contact');
