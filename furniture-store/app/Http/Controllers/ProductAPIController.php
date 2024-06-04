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

        public function create(Request $request)
    {
        // instantiate a new product
        $product = new Product();

        // take the data from the request and save it on the product
        $product->category_id = $request->category_id;
        $product->width = $request->width;
        $product->height = $request->height;
        $product->depth = $request->depth;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->related = $request->related;
        $product->color = $request->color;

        //save the products in db
        $product->save();
        return response()->json([
            'message' => 'product added to db',
            'success' => true
        ]);
    }
    }
        return response()->json([
            'message' => 'products retrieved',
            'success' => true,
            'data' => $products
        ]);
    }

    public function create(Request $request)
    {
        // instantiate a new product
        $product = new Product();

        // take the data from the request and save it on the product
        $product->category_id = $request->category_id;
        $product->width = $request->width;
        $product->height = $request->height;
        $product->depth = $request->depth;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->related = $request->related;
        $product->color = $request->color;

        //save the products in db
        $product->save();
        return response()->json([
           'message' => 'product added to db',
           'success' => true
        ]);
    }
}
