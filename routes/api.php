<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/summary', [DashboardController::class, 'summary']);

Route::prefix('admin')->group(function (): void {
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('orders', OrderController::class)->except(['store', 'create', 'edit']);
});
