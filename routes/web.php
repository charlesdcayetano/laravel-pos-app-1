<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Livewire\CartComponent;
use Illuminate\Support\Facades\Route;


Route::get('/test', CartComponent::class);

Route::get('/test-add', function () {
    return view('misc.suppliers_create');
});

Route::get('generate-pdf', [App\Http\Controllers\PDFController::class, 'generatePDF']);



Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('products', ProductController::class);
    Route::resource('cart', CartController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('genders', GenderController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('discounts', DiscountController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('payment-methods', PaymentMethodController::class);
    Route::resource('users', UserController::class);
});

// Route::group(['middleware' => 'auth'], function () {
//     Route::controller(AuthController::class)->group(function () {
//         Route::get('/logout', 'logout');
//     });
// });
