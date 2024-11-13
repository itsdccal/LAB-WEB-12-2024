<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;


Route::get('/home', [HomeController::class, 'home']) ->name('home');
Route::get('/about', [AboutController::class, 'about']) ->name('about');
Route::get('/contact', [ContactController::class, 'contact']) ->name('contact');
