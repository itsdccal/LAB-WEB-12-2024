<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryLogController;
use App\Http\Controllers\CategoryController;

Route::resource('/product', ProductController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/inventorylog', InventoryLogController::class)->except(['edit', 'update', 'show']);
