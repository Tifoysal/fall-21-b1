<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\UserController;
use App\Models\Product;
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

//Route::get('/', function () {
//    $products=Product::all();
//    return view('website.pages.home',compact('products'));
//});

Route::get('/',[HomeController::class,'home']);

Route::post('/registration',[UserController::class,'registration'])->name('user.registration');
Route::post('/login/post',[UserController::class,'userLogin'])->name('user.do.login');
Route::get('/user/logout',[UserController::class,'userLogout'])->name('user.logout');


Route::group(['prefix'=>'admin'],function (){
    Route::get('/', function () {
        return view('admin.pages.home');
    })->name('home');
    Route::get('order/list',[OrderController::class,'orderList'])->name('admin.order.list');

    //product routes
    Route::get('product-list',[ProductController::class,'productList'])->name('admin.product.list');
    Route::get('product/create',[ProductController::class,'productCreateForm']);
    Route::post('product/store',[ProductController::class,'productStore'])->name('admin.product.store');
    Route::get('product/view/{product_id}',[ProductController::class,'productDetails'])->name('admin.product.details');
    Route::get('product/delete/{product_id}',[ProductController::class,'productDelete'])->name('admin.product.delete');
    Route::get('/product/edit/{id}',[ProductController::class,'productEdit'])->name('admin.product.edit');
    Route::put('/product/update/{id}',[ProductController::class,'productUpdate'])->name('admin.product.update');
    Route::get('/product/search',[ProductController::class,'productSearch'])->name('admin.product.search');


    // category routes
    Route::get('/product/category',[CategoryController::class,'categoryList'])->name('admin.category.list');
    Route::get('/category/create',[CategoryController::class,'categoryCreate'])->name('admin.category.form');
    Route::post('/category/add',[CategoryController::class,'add'])->name('category.add');


    // employee
    Route::get('/employee/list',[EmployeeController::class,'list'])->name('admin.employee.list');
    Route::get('/employee/form',[EmployeeController::class,'create'])->name('admin.employee.form');
    Route::post('/employee/add',[EmployeeController::class,'add'])->name('admin.employee.add');
});


