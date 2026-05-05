<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProfileController as AdminProfile;
<<<<<<< HEAD
use App\Http\Controllers\Admin\ProductionController;
=======
>>>>>>> 612bddbaa9f4a18412e012a7b92ffa32e7ddd4b6
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

<<<<<<< HEAD
    // Catalog management
    Route::get('/catalogs', [App\Http\Controllers\Admin\CatalogController::class, 'index'])->name('catalogs.index');
    Route::get('/catalogs/create', [App\Http\Controllers\Admin\CatalogController::class, 'create'])->name('catalogs.create');
    Route::post('/catalogs', [App\Http\Controllers\Admin\CatalogController::class, 'store'])->name('catalogs.store');
    Route::get('/catalogs/{catalog}', [App\Http\Controllers\Admin\CatalogController::class, 'show'])->name('catalogs.show');
    Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\Admin\CatalogController::class, 'edit'])->name('catalogs.edit');
    Route::put('/catalogs/{catalog}', [App\Http\Controllers\Admin\CatalogController::class, 'update'])->name('catalogs.update');
    Route::delete('/catalogs/{catalog}', [App\Http\Controllers\Admin\CatalogController::class, 'destroy'])->name('catalogs.destroy');

    // Production management
    Route::get('/productions', [ProductionController::class, 'index'])->name('productions.index');
    Route::get('/productions/create', [ProductionController::class, 'create'])->name('productions.create');
    Route::post('/productions', [ProductionController::class, 'store'])->name('productions.store');
    Route::get('/productions/{production}/edit', [ProductionController::class, 'edit'])->name('productions.edit');
    Route::put('/productions/{production}', [ProductionController::class, 'update'])->name('productions.update');
    Route::delete('/productions/{production}', [ProductionController::class, 'destroy'])->name('productions.destroy');

    // Stock management
    Route::get('/stocks', [App\Http\Controllers\Admin\StockController::class, 'index'])->name('stocks.index');

=======
>>>>>>> 612bddbaa9f4a18412e012a7b92ffa32e7ddd4b6
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
<<<<<<< HEAD

    // Catalog
    Route::get('/catalogs', [App\Http\Controllers\Customer\CatalogController::class, 'index'])->name('catalogs.index');
    Route::get('/catalogs/{catalog}', [App\Http\Controllers\Customer\CatalogController::class, 'show'])->name('catalogs.show');
=======
>>>>>>> 612bddbaa9f4a18412e012a7b92ffa32e7ddd4b6
});
