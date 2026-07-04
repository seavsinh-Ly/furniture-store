<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FurnitureController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;

use App\Http\Controllers\FavoriteController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/categories', CategoryController::class);
Route::apiResource('/furniture', FurnitureController::class);

Route::apiResource('/cart', CartController::class);
Route::apiResource('/customer', CustomerController::class);

Route::apiResource('/favorites', FavoriteController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
