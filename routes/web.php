<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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
Route::get('/edit-catagory/{cid}',[FrontendController::class,'catagoryEdit'] )->name('catagoryEdit');
Route::post('/update-catagory/{cid}',[FrontendController::class,'updatecatagory'] )->name('updatecatagory');

Route::get('/add-products',[FrontendController::class,'addProducts'] )->name('addProducts');
Route::post('/save-products',[FrontendController::class,'saveProducts'] )->name('saveProducts');
Route::get('/view-products',[FrontendController::class,'viewProducts'] )->name('viewProducts');
Route::get('/delete-products/{pid}',[FrontendController::class,'deleteProducts'] )->name('deleteProducts');
Route::get('/edit-products/{pid}',[FrontendController::class,'editProducts'] )->name('editProducts');
Route::post('/update-product', [FrontendController::class, 'updateProduct'])->name('updateProducts');
Route::get('/view-product', [UserController::class, 'productView'])->name('productView');
Route::post('/create-cart', [UserController::class, 'createCart'])->name('createCart');
Route::get('/view-cart', [UserController::class, 'viewCart'])->name('viewCart');
Route::get('/delete-Usercart/{pid}', [UserController::class, 'DeleteUserCart'])->name('DeleteUserCart');
Route::get('/checkout', [UserController::class, 'checkout'])->name('checkout');
Route::get('/place-order', [UserController::class, 'showPlaceOrderPage'])->name('placeOrder');
Route::get('/user/profile', [UserController::class, 'userProfile'])->name('userProfile');
Route::get('/user/profile/edit', [UserController::class, 'userProfileEdit'])->name('userProfileEdit');
Route::post('/user/profile/update/{user_id}', [UserController::class, 'userProfileUpdate'])->name('userProfileUpdate');
Route::get('/admin-viewCart', [FrontendController::class, 'adminviewCart'])->name('adminviewCart');
Route::get('/user-Order', [UserController::class, 'placeOrder'])->name('order.success');
Route::get('/user-viewOrder', [UserController::class, 'viewOrder'])->name('viewOrder');
Route::post('/user-cancelOrder/{id}', [UserController::class, 'cancelOrder'])->name('cancelOrder');

Route::get('/user-view-Allproducts', [FrontendController::class, 'viewAllOrders'])->name('orderViewAll');
Route::post('/admin/approve-order/{id}', [FrontendController::class, 'approveOrder'])->name('approveOrder');
Route::get('/notifications', [UserController::class, 'showNotifications'])->name('user.notifications');
Route::get('/contactUs', [HomeController::class, 'contactus'])->name('contactus');
Route::post('/contactUs/save', [HomeController::class, 'save'])->name('save');
Route::get('/admin/contact-us', [FrontendController::class, 'viewContactus'])->name('viewContactus');
Route::get('/admin/delete-contact-us/{id}', [FrontendController::class, 'deleteContactus'])->name('deleteContactus');
Route::get('/user/makepayment', [UserController::class, 'userMakepayment'])->name('userMakepayment');
Route::get('/logout',[FrontendController::class,'logout'] )->name('logout');