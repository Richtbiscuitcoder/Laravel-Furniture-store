<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'allProducts']);

Route::get('/products/{id}', [ProductController::class, 'getSingleProduct']);
