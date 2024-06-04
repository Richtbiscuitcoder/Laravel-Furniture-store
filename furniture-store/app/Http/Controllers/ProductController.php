<?php

namespace App\Http\Controllers;

use App\Models\Product;
//use App\Services\CurrencyConversionService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProducts(Request $request)
    {
        if (isset($request->stock)) {
            $stock = $request->stock;
            $products = Product::where('stock', '=', $stock)->get();
        } else {
            $products = Product::all();
        }

        return view('products', ['products' => $products]);
    }

    public function getSingleProduct(int $id)
    {
        $products = Product::find($id);
//        $products->price = CurrencyConversionService::convertPrice('$', $products->price);
        $similarProduct = Product::find($products->related);
        return view('product', ['product' => $products, 'similarProduct' => $similarProduct]);
    }


}
