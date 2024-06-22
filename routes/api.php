<?php

use App\Http\Controllers\Customer;
use App\Http\Controllers\Diamond_Price_List;
use App\Http\Controllers\Diamond_Shell;
use App\Http\Controllers\Employee;
use App\Http\Controllers\Ex_Diamond;
use App\Http\Controllers\Main_Diamond;
use App\Http\Controllers\Order;
use App\Http\Controllers\Order_Detail;
use App\Http\Controllers\Payment;
use App\Http\Controllers\Product;
use App\Http\Controllers\Reward_Point;
use App\Http\Controllers\Role;
use App\Http\Controllers\Warranty_Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('diamondpricelist', Diamond_Price_List::class);

Route::apiResource('customer', Customer::class);

Route::apiResource('diamondshell', Diamond_Shell::class);

Route::apiResource('employee', Employee::class);

Route::apiResource('exdiamond', Ex_Diamond::class);

Route::apiResource('maindiamond', Main_Diamond::class);

Route::apiResource('orderdetail', Order_Detail::class);

Route::apiResource('order', Order::class);

Route::apiResource('payment', Payment::class);

Route::apiResource('product', Product::class);

Route::apiResource('rewardpoint', Reward_Point::class);

Route::apiResource('role', Role::class);

Route::apiResource('warrantycertificate', Warranty_Certificate::class);

