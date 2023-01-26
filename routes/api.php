<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//category

Route::prefix('category')->group(function () {
	Route::post('store', 'App\Http\Controllers\CategoryController@store')->name('category.store');
	Route::get('list', 'App\Http\Controllers\CategoryController@show')->name('category.list');
	Route::get('edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');
	// Route::put('update/{id}', 'App\Http\Controllers\CategoryController@update')->name('category.update');
	// Route::delete('delete/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('category.delete');
});

//product

Route::prefix('product')->group(function () {
	Route::post('store', 'App\Http\Controllers\ProductsController@store')->name('product.store');
	Route::get('showAll', 'App\Http\Controllers\ProductsController@showAll')->name('product.showAll');
	Route::get('approved', 'App\Http\Controllers\ProductsController@approved')->name('product.approved');
	Route::get('declined', 'App\Http\Controllers\ProductsController@declined')->name('product.declined');
	Route::post('approve/{id}', 'App\Http\Controllers\ProductsController@approveAd')->name('product.approve');
	Route::post('decline/{id}', 'App\Http\Controllers\ProductsController@declineAd')->name('product.decline');
	Route::get('search/{id}', 'App\Http\Controllers\ProductsController@search')->name('product.search');
	Route::get('latest', 'App\Http\Controllers\ProductsController@latestAds')->name('product.latest');
	Route::get('searchbycat/{id}', 'App\Http\Controllers\ProductsController@searchbycat')->name('product.searchbycat');
	Route::get('searchby/{id}/{title}', 'App\Http\Controllers\ProductsController@searchby')->name('product.searchby');
});

// property

Route::prefix('property')->group(function () {
	Route::post('store', 'App\Http\Controllers\PropertyController@store')->name('property.store');
	Route::get('showAll', 'App\Http\Controllers\PropertyController@showAll')->name('property.showAll');
	Route::get('approved', 'App\Http\Controllers\PropertyController@approved')->name('property.approved');
	Route::get('declined', 'App\Http\Controllers\PropertyController@declined')->name('property.declined');
	Route::post('approve/{id}', 'App\Http\Controllers\PropertyController@approve')->name('property.approve');
	Route::post('decline/{id}', 'App\Http\Controllers\PropertyController@decline')->name('property.decline');
	Route::get('latest', 'App\Http\Controllers\PropertyController@latestProperties')->name('property.latest');
	Route::get('search/{id}', 'App\Http\Controllers\PropertyController@search')->name('property.search');
	Route::post('update/{id}', 'App\Http\Controllers\PropertyController@update')->name('property.update');
	Route::delete('delete/{id}', 'App\Http\Controllers\PropertyController@destroy')->name('property.delete');
});

// auction 
Route::prefix('auction')->group(function () {
	Route::post('start', 'App\Http\Controllers\AuctionController@start')->name('auction.start');
	Route::get('list', 'App\Http\Controllers\AuctionController@showAllActive')->name('auction.list');
	Route::get('filter/{status}', 'App\Http\Controllers\AuctionController@filterAuctions')->name('auction.listFilter');
	Route::get('search/{id}', 'App\Http\Controllers\AuctionController@search')->name('auction.search');
	Route::post('update/{id}', 'App\Http\Controllers\AuctionController@update')->name('auction.update');
	Route::post('winner/{auction_id}', 'App\Http\Controllers\AuctionController@addWinner')->name('auction.winner');
	Route::delete('delete/{id}', 'App\Http\Controllers\Api\AuctionController@destroy')->name('auction.delete');
});

//negotiation 
Route::prefix('negotiation')->group(function () {
	Route::post('start', 'App\Http\Controllers\NegotiationController@start')->name('negotiation.start');
	Route::get('list/{auction_id}', 'App\Http\Controllers\NegotiationController@auctionNegotiations')->name('negotiation.list');
	Route::post('update/{id}', 'App\Http\Controllers\NegotiationController@update')->name('negotiation.update');
	Route::delete('delete/{id}', 'App\Http\Controllers\NegotiationController@destroy')->name('negotiation.delete');
});

//admin 
Route::prefix('admin')->group(function () {
	Route::post('signup', 'App\Http\Controllers\AdminController@signup')->name('admin.signup');
	Route::post('signin', 'App\Http\Controllers\AdminController@signin')->name('admin.signin');
	Route::get('showall', 'App\Http\Controllers\AdminController@showAll')->name('admin.showall');
	Route::get('admin/{id}', 'App\Http\Controllers\AdminController@admin')->name('admin.admin');
	Route::post('update/{id}', 'App\Http\Controllers\AdminController@update')->name('admin.update');
	Route::delete('remove/{id}', 'App\Http\Controllers\AdminController@remove')->name('admin.remove');
});

//user 
Route::prefix('user')->group(function () {
	Route::post('signup', 'App\Http\Controllers\AuthController@signup')->name('user.signup');
	Route::post('signin', 'App\Http\Controllers\AuthController@signin')->name('user.signin');
	Route::post('logout', 'App\Http\Controllers\AuthController@logout')->middleware('auth:sanctum')->name('user.logout');
	// Route::get('user', 'App\Http\Controllers\AuthController@getAuthenticatedUser')->middleware('auth:sanctum')->name('auth.user');

	Route::post('/password/email', 'App\Http\Controllers\AuthController@sendPasswordResetLinkEmail')->middleware('throttle:5,1')->name('password.email');
	Route::get('/password/reset/{token}', 'App\Http\Controllers\AuthController@showResetForm')->middleware('web')->name('password.reset.form');
	Route::post('/password/reset', 'App\Http\Controllers\AuthController@resetPassword')->name('password.reset');

	// //change password of admin 
	// Route::post('/password/change/{id}', 'App\Http\Controllers\AuthController@changePassword')->name('password.change');

	Route::get('account/verify/{token}')->middleware('IsVerifyEmail')->name('user.account.verify');
	Route::get('account/verified/{msg}', 'App\Http\Controllers\AuthController@verifiedEmail')->name('account.verified');
});

