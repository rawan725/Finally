<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\SupplyController;

Route::view('/', 'home')->name('home');

Route::get('/supplies', [SupplyController::class, 'index'])
    ->name('supplies');

Route::get('/supplies/category/{category}', [SupplyController::class, 'category'])
    ->name('supplies.category');

Route::get('/supplies/details/{id}', [SupplyController::class, 'show'])
    ->name('supplies.show');

Route::view('/cart', 'cart')
    ->middleware(['auth'])
    ->name('cart');

Route::view('/doctor', 'doctor')
    ->middleware(['auth'])
    ->name('doctor');

Route::view('/doctor-booking', 'doctor-booking')
    ->middleware(['auth'])
    ->name('doctor.booking');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Animals
|--------------------------------------------------------------------------
*/

Route::get('/animals', [AnimalController::class, 'index'])
    ->name('animals');

Route::get('/animals/category/{type}', [AnimalController::class, 'category'])
    ->name('animals.category');

Route::get('/animals/details/{id}', [AnimalController::class, 'show'])
    ->name('animals.show');

require __DIR__.'/auth.php';