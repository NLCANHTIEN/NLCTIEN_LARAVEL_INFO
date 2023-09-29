<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{

    public function index()
    {
        // hien thi toan bo category
        $categories = Category::paginate(5);
        return view('admin.category.index', compact('categories'));
    }


    public function create()
    {
        // show form category
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'cat_name' => ['required', 'unique:categories', 'max:255'],
            'slug' => ['required', 'unique:categories', 'max:255'],
        ]);

        Category::create($request->post());
        return redirect(route('categories.index'))->with('success', 'category has been create successfully.');
    }


    public function show(Category $category)
    {
        // hiển thị chi tiết sản phẩm
        return view('admin.category.show', compact('category'));
    }


    public function edit(Category $category)
    {
        //
        $categories = Category::all();
        return view('admin.category.edit', compact('category', 'categories'));
    }


    public function update(Request $request, Category $category)
    {
        //
        $category->fill($request->post())->save();
        return redirect(route('categories.index'))->with('success', 'category has been update successfully.');
    }


    public function destroy(Category $category)
    {
        //
        $category->Delete();
        return redirect(route('categories.index'))->with('success', 'category has been delete successfully.');
    }
    public function trash()
    {
        $categories = Category::onlyTrashed()->paginate(5);
        return view('admin.category.trash', compact('categories'));
    }
    public function remove($id)
    {
        Category::withTrashed()->find($id)->forceDelete();
        return redirect(route('category.trash'))->with('success', 'category has been delete successfully.');
    }
    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
        return redirect(route('category.trash'))->with('success', 'category has been delete successfully.');
    }
}
