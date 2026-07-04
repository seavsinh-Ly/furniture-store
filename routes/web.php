<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FurnitureController;
use Illuminate\Support\Facades\Route;

// Redirect the root URL to your furniture or categories index page
Route::get('/', function () {
    return redirect()->route('furniture.index');
});

// Resourceful routes for Categories (handles index, create, store, show, edit, update, destroy)
Route::resource('categories', CategoryController::class);

// Resourceful routes for Furniture (handles index, create, store, show, edit, update, destroy)
// Force Laravel to bypass "furnitures" and use "furniture" instead
Route::resource('furniture', FurnitureController::class)->parameters([
    'furniture' => 'furniture'
]);