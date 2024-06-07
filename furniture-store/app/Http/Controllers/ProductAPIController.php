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

    public function getSingleProduct(int $id)
    {
        $product = Product::find($id);


        return response()->json([
            'message' => 'product retrieved from db',
            'success' => true,
            'data' => $product
        ]);
    }




    public function create(Request $request)
{
    $request->validate([
        'category_id' => 'required|integer|exists:categories,id',
        'price' => 'required|decimal:2',
        'stock' => 'required|integer',
        'width' => 'required|integer',
        'height' => 'required|integer',
        'depth'=> 'required|integer',
        'related' => 'required|integer',
        'color' => 'required|string|max:255'
    ]);
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

    public function updateProduct(int $id, Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|decimal:2',
            'stock' => 'required|integer',
            'width' => 'required|integer',
            'height' => 'required|integer',
            'depth'=> 'required|integer',
            'related' => 'required|integer',
            'color' => 'required|string|max:255'
        ]);

        $product = Product::find($id);

        $product->category_id = $request->category_id;
        $product->width = $request->width;
        $product->height = $request->height;
        $product->depth = $request->depth;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->related = $request->related;
        $product->color = $request->color;

        $product->save();

        return response()->json([
            'message' => 'updated data',
            'success' => true
        ]);
    }

    public function deleteProduct(int $id, Request $request)
    {

        $product = Product::find($id);

        $product->category_id = $request->category_id;
        $product->width = $request->width;
        $product->height = $request->height;
        $product->depth = $request->depth;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->related = $request->related;
        $product->color = $request->color;

        $product->delete();

        return response()->json([
            'message' => 'deleted data',
            'success' => true
        ]);
    }


}
