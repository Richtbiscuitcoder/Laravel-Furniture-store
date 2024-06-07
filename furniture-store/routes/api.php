<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductAPIController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/products', [ProductAPIController::class, 'index']);

Route::get('/products/{id}', [ProductAPIController::class, 'getSingleProduct']);

Route::post('/products/', [ProductAPIController::class, 'create']);

Route::put('/products/{id}', [ProductAPIController::class, 'updateProduct']);

Route::delete('/products/{id}', [ProductAPIController::class, 'deleteProduct']);
