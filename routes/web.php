<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProfileController as AdminProfile;
use App\Http\Controllers\Supplier\DashboardController as SupplierDashboard;
use App\Http\Controllers\Supplier\ProfileController as SupplierProfile;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboard;
use App\Http\Controllers\Customer\ProfileController as CustomerProfile;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    // Supplier management
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])->name('suppliers.show');

    // Customer management
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');

    // Profile
    Route::get('/profile', [AdminProfile::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [AdminProfile::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [AdminProfile::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Supplier Routes
|--------------------------------------------------------------------------
*/

Route::prefix('supplier')->middleware(['auth', 'role:supplier'])->name('supplier.')->group(function () {
    Route::get('/dashboard', [SupplierDashboard::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [SupplierProfile::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [SupplierProfile::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [SupplierProfile::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

Route::prefix('customer')->middleware(['auth', 'role:customer'])->name('customer.')->group(function () {
    Route::get('/dashboard', [CustomerDashboard::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [CustomerProfile::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [CustomerProfile::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [CustomerProfile::class, 'update'])->name('profile.update');
});
