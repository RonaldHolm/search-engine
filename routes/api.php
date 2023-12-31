<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::post('register', [\App\Http\Controllers\Api\Auth\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\Auth\AuthController::class, 'logout']);
});

Route::get('/products/search', [ProductController::class, 'search']);
Route::get('/products/recommendations', [ProductController::class, 'recommendations']);
Route::resource('/products', ProductController::class)->only('show');

Route::resource('/categories', CategoryController::class)->only('index');
Route::resource('/brands', BrandController::class)->only('index');
