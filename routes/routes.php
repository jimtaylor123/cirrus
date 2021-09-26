<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MonthlyUsageController;

/**
 * Our web routes
 */
Auth::routes(['register' => false]);

Route::get('/', function () {
    return Auth::check()? view('home') : view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

/**
 * Our API routes
 */
Route::prefix('api')->group(function(){
    Route::middleware('auth')->group(function(){
        Route::resource('customers', CustomerController::class)->only([
            'index', // i.e. /customers
        ]);
        Route::resource('customers.accounts', AccountController::class)->only([
            'index', // e.g. /customers/1/accounts
        ]);
        Route::resource('accounts.monthlyusages', MonthlyUsageController::class)->only([
            'index', // e.g. /accounts/1/monthlyusages
        ]);
    });
});
// Catch all route
Route::get('/{any}', [HomeController::class, 'index'])->where('any', '.*');
