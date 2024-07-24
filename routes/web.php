<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Homepage', function () {
    return view('welcome');
});

Route::get('api/product/update/{product_code}', [App\Http\Controllers\Product::class, 'getProductByCode']);
Route::get('order/search/{user_name}/{order_date}', [App\Http\Controllers\Order::class, 'searchOrder']);
Route::get('home_manager/dashboard/{criteria}', [App\Http\Controllers\Order::class, 'dashboardDataRender']);
Route::get('home_manager/for_sale/data', [App\Http\Controllers\Order_Detail::class, 'dataForBoard']);
Route::get('home_manager/product/data', [App\Http\Controllers\Product::class, 'dataForBoard']);
Route::get('home_manager/user/data', [App\Http\Controllers\User::class, 'dataForBoard']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');