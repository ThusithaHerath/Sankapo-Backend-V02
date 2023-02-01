<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ActionController;


Route::get('/', function () {return view('admin-template.auth.login');});
Route::get('/home', [PageController::class,'home']);

//ad manager
//products
Route::get('/products',[PageController::class,'productsIndex'])->middleware('AdminAuth');
Route::get('/view-product/{id}',[PageController::class,'viewProduct']);
Route::get('/approve-product/{id}',[ActionController::class,'approveProduct']);
Route::get('/decline-product/{id}',[ActionController::class,'declineProduct']);
//properties
Route::get('/properties',[PageController::class,'propertiesIndex']);
Route::get('/view-property/{id}',[PageController::class,'viewProperty']);
Route::get('/approve-property/{id}',[ActionController::class,'approveProperty']);
Route::get('/decline-property/{id}',[ActionController::class,'declineProperty']);



//category manager
Route::get('/add-category',[PageController::class,'addCategory']);
Route::get('/categories',[PageController::class,'categories']);
Route::get('/remove-category/{id}',[ActionController::class,'removeCategory']);

//users 
Route::get('/users',[PageController::class,'users']);

//admin-users
Route::get('/admin-users',[PageController::class,'adminUsers']);
Route::get('/remove-admin/{id}',[ActionController::class,'removeAdmin']);
Route::get('/edit-admin/{id}',[PageController::class,'editAdmin']);
Route::get('/add-new-admin',[PageController::class,'addAdmin']);

Route::get('/resetpassword', function () {return view('resetPasswords.resetPassword');});