<?php

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

Route::post('product', [\App\Http\Controllers\ProductController::class, 'create']);
Route::post('product_movement', [\App\Http\Controllers\ProductController::class, 'movement']);
Route::get('product_history', [\App\Http\Controllers\ProductController::class, 'history']);
