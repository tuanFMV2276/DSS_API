<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product;
use App\Http\Controllers\Order;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Homepage', function () {
    return view('welcome');
});

Route::get('api/product/update/{product_code}', [Product::class, 'getProductByCode']);

Route::get('api/order/search/{user_name}', [Order::class, 'searchOrderByName']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');