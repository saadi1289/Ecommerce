<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        $latestProducts = Product::latest()->take(5)->get();
        return view('welcome', compact('products', 'categories', 'latestProducts'));

    }

    public function showProductDetails($id)
    {
        $product = Product::findOrFail($id);
        $related = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->take(4)
            ->get();
        return view('product.product_details', compact('product', 'related'));
    }

}
