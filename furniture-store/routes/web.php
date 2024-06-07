<?php
namespace App\Services;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products', [ProductController::class, 'allProducts']);

Route::get('/products/{id}', [ProductController::class, 'getSingleProduct']);

//Route::get('/products/gbp' , [CurrencyConversionService::class, 'convertPrice']);
//Route::get('/products/usd' , [CurrencyConversionService::class, 'convertPrice']);
//Route::get('/products/eur' , [CurrencyConversionService::class, 'convertPrice']);
//Route::get('/products/yen' , [CurrencyConversionService::class, 'convertPrice']);

