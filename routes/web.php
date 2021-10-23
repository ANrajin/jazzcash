<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductsController::class, 'index']);
Route::get('product/{products}', [ProductsController::class, 'show'])->name('product');
Route::post('/checkout/{products}', [ProductsController::class, 'pay'])->name('checkout');

Route::get('status', [ProductsController::class, 'status'])->name('status');

Route::view('test', 'test');
Route::post('test-post', [ProductsController::class, 'test'])->name('test');
