<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminSupplyController;
use App\Http\Controllers\AdminAnimalController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorBookingController;
use App\Http\Controllers\AdminDoctorController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PetMedicalProfileController;


Route::view('/', 'home')->name('home');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Supplies
|--------------------------------------------------------------------------
*/

Route::get('/supplies', [SupplyController::class, 'index'])
    ->name('supplies');

Route::get('/supplies/category/{category}', [SupplyController::class, 'category'])
    ->name('supplies.category');

Route::get('/supplies/details/{id}', [SupplyController::class, 'show'])
    ->name('supplies.show');

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

/*
|--------------------------------------------------------------------------
| Cart
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index'])
    ->middleware('auth')
    ->name('cart');

Route::post('/cart/add-supply/{id}', [CartController::class, 'addSupply'])
    ->middleware('auth')
    ->name('cart.addSupply');

Route::post('/cart/add-animal/{id}', [CartController::class, 'addAnimal'])
    ->middleware('auth')
    ->name('cart.add-animal');

Route::post('/cart/item/{id}/increase', [CartController::class, 'increase'])
    ->middleware('auth')
    ->name('cart.increase');

Route::post('/cart/item/{id}/decrease', [CartController::class, 'decrease'])
    ->middleware('auth')
    ->name('cart.decrease');

Route::delete('/cart/item/{id}', [CartController::class, 'destroy'])
    ->middleware('auth')
    ->name('cart.destroy');

/*
|--------------------------------------------------------------------------
| Checkout & Orders
|--------------------------------------------------------------------------
*/

Route::get('/checkout', [OrderController::class, 'checkout'])
    ->middleware('auth')
    ->name('checkout');

Route::post('/checkout/confirm', [OrderController::class, 'store'])
    ->middleware('auth')
    ->name('checkout.confirm');

Route::get('/order-success/{id}', [OrderController::class, 'success'])
    ->middleware('auth')
    ->name('order.success');

Route::get('/my-orders', [OrderController::class, 'myOrders'])
    ->middleware('auth')
    ->name('my.orders');

/*
|--------------------------------------------------------------------------
| Doctors
|--------------------------------------------------------------------------
*/

Route::get('/doctor', [DoctorController::class, 'index'])
    ->middleware('auth')
    ->name('doctor');

Route::get('/doctors/{doctor}/book/{type}', [DoctorBookingController::class, 'book'])
    ->middleware('auth')
    ->name('doctor.book');

Route::post('/doctors/{doctor}/book/{type}', [DoctorBookingController::class, 'storeForDoctor'])
    ->middleware('auth')
    ->name('doctor.book.store');

Route::get('/doctor-booking', [DoctorBookingController::class, 'create'])
    ->middleware('auth')
    ->name('doctor.booking');

/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [OrderController::class, 'adminDashboard'])
    ->middleware('auth')
    ->name('admin.dashboard');

Route::get('/admin/orders', [OrderController::class, 'adminOrders'])
    ->middleware('auth')
    ->name('admin.orders');

Route::get('/admin/orders/{id}', [OrderController::class, 'adminOrderDetails'])
    ->middleware('auth')
    ->name('admin.orders.details');

Route::patch('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])
    ->middleware('auth')
    ->name('admin.orders.status');

/*
|--------------------------------------------------------------------------
| Admin Supplies
|--------------------------------------------------------------------------
*/

Route::get('/admin/supplies', [AdminSupplyController::class, 'index'])
    ->middleware('auth')
    ->name('admin.supplies');

Route::get('/admin/supplies/create', [AdminSupplyController::class, 'create'])
    ->middleware('auth')
    ->name('admin.supplies.create');

Route::post('/admin/supplies', [AdminSupplyController::class, 'store'])
    ->middleware('auth')
    ->name('admin.supplies.store');

Route::get('/admin/supplies/{id}/edit', [AdminSupplyController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.supplies.edit');

Route::put('/admin/supplies/{id}', [AdminSupplyController::class, 'update'])
    ->middleware('auth')
    ->name('admin.supplies.update');

Route::delete('/admin/supplies/{id}', [AdminSupplyController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.supplies.destroy');

/*
|--------------------------------------------------------------------------
| Admin Animals
|--------------------------------------------------------------------------
*/

Route::get('/admin/animals', [AdminAnimalController::class, 'index'])
    ->middleware('auth')
    ->name('admin.animals');

Route::get('/admin/animals/create', [AdminAnimalController::class, 'create'])
    ->middleware('auth')
    ->name('admin.animals.create');

Route::post('/admin/animals', [AdminAnimalController::class, 'store'])
    ->middleware('auth')
    ->name('admin.animals.store');

Route::get('/admin/animals/{id}/edit', [AdminAnimalController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.animals.edit');

Route::put('/admin/animals/{id}', [AdminAnimalController::class, 'update'])
    ->middleware('auth')
    ->name('admin.animals.update');

Route::delete('/admin/animals/{id}', [AdminAnimalController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.animals.destroy');

    Route::get('/admin/doctors', [AdminDoctorController::class, 'index'])
    ->middleware('auth')
    ->name('admin.doctors');

Route::get('/admin/doctors/create', [AdminDoctorController::class, 'create'])
    ->middleware('auth')
    ->name('admin.doctors.create');

Route::post('/admin/doctors', [AdminDoctorController::class, 'store'])
    ->middleware('auth')
    ->name('admin.doctors.store');

Route::get('/admin/doctors/{id}/edit', [AdminDoctorController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.doctors.edit');

Route::put('/admin/doctors/{id}', [AdminDoctorController::class, 'update'])
    ->middleware('auth')
    ->name('admin.doctors.update');

Route::delete('/admin/doctors/{id}', [AdminDoctorController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.doctors.destroy');


    Route::get('/admin/doctor-bookings', [DoctorBookingController::class, 'adminIndex'])
    ->middleware('auth')
    ->name('admin.doctor.bookings');

Route::patch('/admin/doctor-bookings/{id}/status', [DoctorBookingController::class, 'updateStatus'])
    ->middleware('auth')
    ->name('admin.doctor.bookings.status');

    Route::get('/my-consultations', [DoctorBookingController::class, 'myConsultations'])
    ->middleware('auth')
    ->name('my.consultations');
    Route::delete('/admin/doctor-bookings/{id}', [DoctorBookingController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.doctor.bookings.destroy');

    Route::post('/contact-message', [ContactMessageController::class, 'store'])
    ->name('contact.store');

Route::get('/admin/contact-messages', [ContactMessageController::class, 'adminIndex'])
    ->middleware('auth')
    ->name('admin.contact.messages');

Route::delete('/admin/contact-messages/{id}', [ContactMessageController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.contact.messages.destroy');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('admin.dashboard');

    Route::get('/provider/dashboard', [ProviderController::class, 'dashboard'])
    ->middleware('auth')
    ->name('provider.dashboard');

Route::post('/provider/apply', [ProviderController::class, 'storeApplication'])
    ->middleware('auth')
    ->name('provider.apply');

    Route::get('/admin/providers', [ProviderController::class, 'adminIndex'])
    ->middleware('auth')
    ->name('admin.providers');

Route::patch('/admin/providers/{provider}/status', [ProviderController::class, 'updateStatus'])
    ->middleware('auth')
    ->name('admin.providers.status');

    Route::get('/pet-medical-profile', [PetMedicalProfileController::class, 'index'])
    ->middleware('auth')
    ->name('pet.medical.profile');

Route::post('/pet-medical-profile', [PetMedicalProfileController::class, 'store'])
    ->middleware('auth')
    ->name('pet.medical.profile.store');

require __DIR__.'/auth.php';