<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sample;
use App\Http\Controllers\Products;
use App\Http\Controllers\WebsiteControllers;
use App\Http\Controllers\Colors;

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
Route::get('/admin/daskboard', [WebsiteControllers::class, 'daskboard'])->name('admin.daskboard');
Route::get('/admin/categories', [WebsiteControllers::class, 'categories'])->name('admin.categories');
Route::get('/admin/categories/create', [WebsiteControllers::class, 'categories_create'])->name('admin.categories.create');
Route::post('/admin/categories/create', [WebsiteControllers::class, 'categories_create_store']);
Route::get('/admin/products', [WebsiteControllers::class, 'products'])->name('admin.products');
Route::get('/admin/products/create', [WebsiteControllers::class, 'products_create'])->name('admin.products.create');
Route::post('/admin/products/create', [WebsiteControllers::class, 'products_create_store'])->name('admin.products.create.store');
Route::post('/admin/products/create/upload', [WebsiteControllers::class, 'ckeditor_upload'])->name('ckeditor.upload');
Route::get('/admin/products/delete/{id}', [WebsiteControllers::class, 'product_delete'])->name('admin.product.delete');
Route::get('/admin/getimages', [WebsiteControllers::class, 'getimages'])->name('admin.getimages');


Route::get('/', [WebsiteControllers::class, 'index'])->name('home.view');
Route::get('/form', [Products::class, 'index'])->name('product.view');
Route::Post('/form', [Products::class, 'store'])->name('product.add');


Route::get('addtocart/{id}', [Products::class, 'addtocard'])->name('add.to.cart');
Route::post('/productcart', [Products::class, 'productaddtocard']);
Route::get('Product/{id}', [Products::class, 'product']);

Route::delete('/delete-cart-product', [Products::class, 'DeleteCartProduct'])->name('delete.cart.product');

Route::get('checkout', [Products::class, 'checkout'])->name('checkout.view');
Route::get('product/delete/{id}', [Products::class, 'ProductDelete']);

Route::post('/quantityupdate', [Products::class, 'QuantityUpdate']);
Route::post('/dchargeupdate', [Products::class, 'dchargeupdate'])->name('dcharge.update');

Route::post('/orderstore', [Products::class, 'order_submit']);

Route::get('/color', [Colors::class, 'index'])->name('color.view');
Route::Post('/color', [Colors::class, 'store'])->name('color.add');

Route::get('/cartcount', [Products::class, 'cartcount']);
