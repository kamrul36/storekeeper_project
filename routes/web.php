<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/sell/{product}', [ProductController::class, 'sellForm'])->name('products.sellForm');

Route::post('/products/sell/{product}', [ProductController::class, 'sell'])->name('products.sell');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/sales-history', [ProductController::class, 'transactionHistory'])->name('transactionHistory');
