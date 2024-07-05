<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product;
<<<<<<< HEAD
use App\Http\Controllers\Order;
=======
>>>>>>> 65fa1c1ba7b845533ab6b589e1bc300a49f1f385

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

<<<<<<< HEAD
Route::get('api/order/search/{user_name}', [Order::class, 'searchOrderByName']);
=======
>>>>>>> 65fa1c1ba7b845533ab6b589e1bc300a49f1f385

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');