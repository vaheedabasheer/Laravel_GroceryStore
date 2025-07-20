<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
Route::get('/',[FrontendController::class,'index'] )->name('home');
Route::get('/login',[FrontendController::class,'login'] )->name('login');
Route::get('/register',[FrontendController::class,'register'] )->name('register');
Route::post('/save',[FrontendController::class,'save'] )->name('save');
Route::post('/dologin', [FrontendController::class, 'dologin'])->name('dologin');
Route::get('/user',[FrontendController::class,'user'] )->name('user');
Route::get('/admin',[FrontendController::class,'admin'] )->name('admin');
Route::get('/add',[FrontendController::class,'add'] )->name('add');
Route::post('/add-catagory',[FrontendController::class,'addCatagory'] )->name('addCatagory');
Route::get('/view-catagory',[FrontendController::class,'viewCatagory'] )->name('viewCatagory');
Route::get('/delete-catagory/{cid}',[FrontendController::class,'catagoryDelete'] )->name('catagoryDelete');
Route::get('/add-products',[FrontendController::class,'addProducts'] )->name('addProducts');
Route::post('/save-products',[FrontendController::class,'saveProducts'] )->name('saveProducts');
Route::get('/view-products',[FrontendController::class,'viewProducts'] )->name('viewProducts');
Route::get('/delete-products/{pid}',[FrontendController::class,'deleteProducts'] )->name('deleteProducts');
Route::get('/edit-products/{pid}',[FrontendController::class,'editProducts'] )->name('editProducts');
Route::post('/update-product', [FrontendController::class, 'updateProduct'])->name('updateProduct');
Route::get('/view-product', [UserController::class, 'productView'])->name('productView');
Route::post('/create-cart', [UserController::class, 'createCart'])->name('createCart');
Route::get('/view-cart', [UserController::class, 'viewCart'])->name('viewCart');
Route::get('/delete-Usercart/{pid}', [UserController::class, 'DeleteUserCart'])->name('DeleteUserCart');
Route::get('/checkout', [UserController::class, 'checkout'])->name('checkout');
Route::get('/logout',[FrontendController::class,'logout'] )->name('logout');