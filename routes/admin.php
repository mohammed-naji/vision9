<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('users', function() { return 'Admin Users'; })->name('users');
    Route::get('posts', function() { return 'Admin posts'; })->name('posts');;
    Route::get('comments', function() { return 'Admin comments'; })->name('comments');;
    Route::get('categories', function() { return 'Admin categories'; })->name('categories');;
    Route::get('products', function() { return 'Admin products'; })->name('products');;
    Route::get('orders', function() { return 'Admin orders'; })->name('orders');;
    Route::get('payments', function() { return 'Admin payments'; })->name('payments');;
});
