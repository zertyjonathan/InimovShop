<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductController;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ProductController::class,'index'])->name('main');

Route::get('login', [loginController::class,'index'])->name('login');
Route::post('login', [loginController::class,'authenticate'])->name('login');

Route::get('productsCategory/{category}', [CategoryController::class,'showProductCategory'])->name('productsCategory');
Route::get('getAllProducts', [ProductController::class,'getAllproducts'])->name('getAllproducts');
Route::get('productCategory/{category}/{product}', [ProductController::class,'productCategorieByNameProduct'])->name('productCategory');

Route::middleware('auth')->group(function () {
    Route::get('products', [ProductController::class,'index'])->name('products');
    Route::get('newProduct', [ProductController::class,'create'])->name('newProduct');
    Route::get('product/{product}', [ProductController::class,'show'])->name('product');
    Route::get('upProduct/{product}', [ProductController::class, 'edit'])->name('upProduct');
    Route::post('newProduct', [ProductController::class,'store'])->name('newProduct');
    Route::post('upProduct', [ProductController::class,'update'])->name('upProduct');
    Route::get('deleteProduct/{product}', [ProductController::class,'destroy'])->name('deleteProduct');

    Route::get('categories', [CategoryController::class,'index'])->name('categories');
    Route::get('newCategory', [CategoryController::class,'create'])->name('newCategory');
    Route::get('category/{category}', [CategoryController::class,'show'])->name('category');
    Route::get('upCategory/{category}', [CategoryController::class, 'edit'])->name('upCategory');
    Route::post('newCategory', [CategoryController::class,'store'])->name('newCategory');
    Route::post('upCategory/{category}', [CategoryController::class,'update'])->name('upCategory');
    Route::get('deleteCategory/{category}', [CategoryController::class,'delete'])->name('deleteCategory');

    Route::get('/loggout', function () {
        Auth::logout();
        Toastr::success('Déconnecté avec succès','Success');
        return redirect('/');
    })->name('loggout');
});







