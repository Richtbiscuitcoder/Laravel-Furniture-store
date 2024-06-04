<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductAPIController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'message' => 'products retrieved',
            'success' => true,
            'data' => $products
        ]);
    }
}
