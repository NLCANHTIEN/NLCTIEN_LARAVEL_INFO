<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

use Illuminate\Http\Request;

class AdminProductController extends Controller
{

    public function index()
    {
        // hien thi toan bo product
        $products = Product::paginate(5);
        return view('admin.product.index', compact('products'));
    }


    public function create()
    {
        // show form product
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'product_name' => ['required', 'unique:products', 'max:255'],
            'slug' => ['required', 'unique:products', 'max:255'],
        ]);

        Product::create($request->post());
        return redirect(route('products.index'))->with('success', 'product has been create successfully.');
    }


    public function show(Product $product)
    {
        // hiển thị chi tiết sản phẩm
        return view('admin.product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        // 

        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }


    public function update(Request $request, Product $product)
    {
        //
        $validate = $request->validate([
            'product_name' => ['required', 'unique:products', 'max:255'],
            'slug' => ['required', 'unique:products', 'max:255'],
        ]);
        $product->fill($request->post())->save();
        return redirect(route('products.index'))->with('success', 'product has been update successfully.');
    }


    public function destroy(Product $product)
    {
        //
        $product->Delete();
        return redirect(route('products.index'))->with('success', 'product has been delete successfully.');
    }
    public function trash()
    {
        $products = Product::onlyTrashed()->paginate(5);
        return view('admin.product.trash', compact('products'));
    }
    public function remove($id)
    {
        Product::withTrashed()->find($id)->forceDelete();
        return redirect(route('product.trash'))->with('success', 'product has been delete successfully.');
    }
    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
        return redirect(route('product.trash'))->with('success', 'product has been delete successfully.');
    }
}
