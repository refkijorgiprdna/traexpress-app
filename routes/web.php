<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\TravelController;
use App\Http\Controllers\JadwalTravelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransaksiController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::get('/jadwal-travel', [JadwalTravelController::class, 'index'])->name('jadwal-travel');

// Checkout routes with middleware auth
Route::middleware(['auth'])->group(function () {
    // Process checkout (starting point)
    Route::post('/checkout-process/{id}', [CheckoutController::class, 'process'])
        ->name('checkout-process');

    // Show checkout page
    Route::get('/checkout/{id}', [CheckoutController::class, 'index'])
        ->name('checkout');

    // Add passenger
    Route::post('/checkout/create/{id}', [CheckoutController::class, 'create'])
        ->name('checkout-create');

    // Remove passenger - change to DELETE method to match your form
    Route::delete('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove'])
        ->name('checkout-remove');

    // Confirm checkout
    Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'success'])
        ->name('checkout-success');
});

// Route::post('/checkout/{id}', [CheckoutController::class, 'process'])
//     ->name('checkout-process')
//     ->middleware('auth');

// Route::get('/checkout/{id}', [CheckoutController::class, 'index'])
//     ->name('checkout')
//     ->middleware('auth');

// Route::post('/checkout/create/{detail_id}', [CheckoutController::class, 'create'])
//     ->name('checkout-create')
//     ->middleware('auth');

// Route::get('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove'])
//     ->name('checkout-remove')
//     ->middleware('auth');

// Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'success'])
//     ->name('checkout-success')
//     ->middleware('auth');


Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->group(function() {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('travel', (TravelController::class));
        Route::resource('transaksi', (TransaksiController::class));

    });

Auth::routes();
