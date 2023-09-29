<?php

use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Shop\ProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'home'])->name('homepage');
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{slug}', [ProductController::class, 'showBySlug']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('categories/trash', [AdminCategoryController::class, 'trash'])->name('category.trash'); //path xem giỏ rác
    Route::get('categories/restore/{id}', [AdminCategoryController::class, 'restore']);
    Route::get('categories/remove/{id}', [AdminCategoryController::class, 'remove']);
    Route::resource('categories', AdminCategoryController::class);

    Route::get('/products/trash', [AdminProductController::class, 'trash'])->name('product.trash'); //path xem giỏ rác
    Route::get('/products/restore/{id}', [AdminProductController::class, 'restore']);
    Route::get('/products/remove/{id}', [AdminProductController::class, 'remove']);
    Route::resource('/products', AdminProductController::class);
});

//Route::get('/admin/products/trash', [AdminProductController::class, 'trash'])->name('product.trash'); //path xem giỏ rác
//Route::get('/admin/products/restore/{id}', [AdminProductController::class, 'restore']);
//Route::get('/admin/products/remove/{id}', [AdminProductController::class, 'remove']);
//Route::resource('/admin/products', AdminProductController::class);





Route::get('/cart', [CartController::class, 'cart']);
Route::get('/add-cart/{id}', [CartController::class, 'add']);
Route::get('/delete-cart/{rowId}', [CartController::class, 'delete']);
Route::get('/dec-cart/{rowId}', [CartController::class, 'dec']);
Route::get('/inc-cart/{rowId}', [CartController::class, 'inc']);
Route::get('/checkout', [CartController::class, 'checkout']);
Route::post('/do-checkout', [CartController::class, 'doCheckout']);

Route::get('/showproduct/{cat_id}', [ProductController::class, 'getbycatid']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
