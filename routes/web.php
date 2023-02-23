<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('admin-template.auth.login');
});
Route::get('/home', [PageController::class, 'home'])->middleware('sessions')->name('home.home');
Route::get('/adminLogout', [AuthController::class, 'adminLogout'])->middleware('sessions')->name('admin.logout');

//ad manager
//products
Route::get('/products', [PageController::class, 'productsIndex'])->middleware(['sessions', 'AdminAuth']);
Route::get('/view-product/{id}', [PageController::class, 'viewProduct'])->middleware(['sessions', 'AdminAuth']);
Route::get('/approve-product/{id}', [ActionController::class, 'approveProduct'])->middleware(['sessions', 'AdminAuth']);
Route::get('/decline-product/{id}', [ActionController::class, 'declineProduct'])->middleware(['sessions', 'AdminAuth']);
//properties
Route::get('/properties', [PageController::class, 'propertiesIndex'])->middleware(['sessions', 'AdminAuth']);
Route::get('/view-property/{id}', [PageController::class, 'viewProperty'])->middleware(['sessions', 'AdminAuth']);
Route::get('/approve-property/{id}', [ActionController::class, 'approveProperty'])->middleware(['sessions', 'AdminAuth']);
Route::get('/decline-property/{id}', [ActionController::class, 'declineProperty'])->middleware(['sessions', 'AdminAuth']);

//banner
Route::get('/add-banner', [PageController::class, 'addBanner'])->middleware(['sessions', 'AdminAuth']);
Route::get('/banners', [PageController::class, 'banners'])->middleware(['sessions', 'AdminAuth']);
Route::get('approved',  [ActionController::class, 'approved'])->middleware(['sessions', 'AdminAuth']);
Route::get('approve/{id}',  [ActionController::class, 'approveBanner'])->middleware(['sessions', 'AdminAuth']);

//category manager
Route::get('/add-category', [PageController::class, 'addCategory'])->middleware(['sessions', 'AdminAuth']);
Route::get('/categories', [PageController::class, 'categories'])->middleware(['sessions', 'AdminAuth']);
Route::get('/remove-category/{id}', [ActionController::class, 'removeCategory'])->middleware(['sessions', 'AdminAuth']);

//users 
Route::get('/users', [PageController::class, 'users'])->middleware(['sessions', 'AdminAuth']);

//admin-users
Route::get('/admin-users', [PageController::class, 'adminUsers'])->middleware(['sessions', 'AdminAuth']);
Route::get('/remove-admin/{id}', [ActionController::class, 'removeAdmin'])->middleware(['sessions', 'AdminAuth']);
Route::get('/edit-admin/{id}', [PageController::class, 'editAdmin'])->middleware(['sessions', 'AdminAuth']);
Route::get('/add-new-admin', [PageController::class, 'addAdmin'])->middleware(['sessions', 'AdminAuth']);

Route::get('/resetpassword', function () {
    return view('resetPasswords.resetPassword');
});