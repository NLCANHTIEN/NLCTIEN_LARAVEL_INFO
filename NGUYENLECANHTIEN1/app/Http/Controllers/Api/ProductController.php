<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Product as ProductResource;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();


        if (isset($params['search'])) $products = Product::where('product_name', 'like', "%{$params['search']}%")->paginate(50)->appends(request()->query());
        else if (isset($params['cat_id'])) $products = Product::where('cat_id', '=', $params['cat_id'])->paginate(50)->appends(request()->query());
        else if (isset($params['brand_id'])) $products = Product::where('brand_id', '=', $params['brand_id'])->paginate(50)->appends(request()->query());
        else if (isset($params['type'])) $products = Product::where('type', '=', $params['type'])->paginate(50)->appends(request()->query());
        else  $products = Product::paginate(50);
        // return $products;     
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return  Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        return $product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return  $product->delete();
        //
    }

    public function remove(Product $product)
    {
        return  $product->forceDelete();
    }

    public function trash()
    {
        return  Product::onlyTrashed()->paginate(25);
    }

    public function restore($id)
    {
        return  Product::withTrashed()->find($id)->restore();
    }
}
