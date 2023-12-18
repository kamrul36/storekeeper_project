    <?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ProductController::class, 'create'])->name('products.create');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');



Route::post('/products', [ProductController::class, 'store'])->name('products');

Route::get('/products/sell/{product}', [ProductController::class, 'sellForm'])->name('products.sellForm');

// Route::post('/products/sell/{product}', [ProductController::class, 'sell'])->name('products.sell');
Route::post('/products/sell/{product}', [ProductController::class, 'sell'])->name('products.sell');

Route::get('/products/update/{product}', [ProductController::class, 'showUpdatePriceForm'])->name('products.showUpdateForm');

Route::post('/products/update/{product}', [ProductController::class, 'updatePrice'])->name('products.updatePrice');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/sales-history', [ProductController::class, 'transactionHistory'])->name('transactionHistory');
