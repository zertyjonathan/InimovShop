<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [loginController::class,'authenticateApi'])->name('login');

Route::middleware('auth:api')->group(function (){
    Route::post('loggout', [loginController::class,'logoutApi'])->name('loggout');

    Route::get('getAllProducts', [ProductController::class,'getAllproducts'])->name('getAllproducts');
    Route::get('product/{product}', [ProductController::class,'show'])->name('product');
    Route::get('deleteProduct/{product}', [ProductController::class,'destroyApi'])->name('deleteProduct');
    Route::post('upProduct', [ProductController::class,'updateApi'])->name('upProduct');
    Route::post('newProduct', [ProductController::class,'storeApi'])->name('newProduct');
    
    Route::post('newCategory', [CategoryController::class,'storeApi'])->name('newCategory');
    Route::get('deleteCategory/{category}', [CategoryController::class,'deleteApi'])->name('deleteCategory');
    Route::get('category/{category}', [CategoryController::class,'showApi'])->name('category');
    Route::get('productsCategory/{category}', [CategoryController::class,'showProductCategory'])->name('productsCategory');
    Route::get('productCategory/{category}/{product}', [ProductController::class,'productCategorieByNameProduct'])->name('productCategory');
});


