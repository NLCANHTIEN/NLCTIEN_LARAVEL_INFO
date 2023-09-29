<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::delete('products.remove/{product}', [ProductController::class, 'remove'])->name('products.remove');
Route::get('/products.restore/{id}', [ProductController::class, 'restore']);
Route::get('/products.trash', [ProductController::class, 'trash']);
Route::apiResource('products', ProductController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
