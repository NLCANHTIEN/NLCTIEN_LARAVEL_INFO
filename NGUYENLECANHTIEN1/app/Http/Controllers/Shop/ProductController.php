<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12)->withQueryString();;
        return view('shop.product.index', ['products' => $products]);
        //return view('shop.product.index', compact('products'));
    }

    public function home()
    {

        return (view('shop.product.home'));
    }


    public function showBySlug($slug)

    {
        $product = Product::where('slug', $slug)->first();
        return view('shop.product.show_by_slug', ['product' => $product]);
    }

    public function getbycatid($cat_id)

    {
        $products = Product::where('cat_id', $cat_id)->get();
        return view('shop.product.index', ['products' => $products]);
    }
}
