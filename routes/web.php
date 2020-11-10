<?php

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

Route::get('/', 'HomeController@index');
Route::get('search/{searchKey?}/{page?}', 'HomeController@search');
Route::get('product/{category}', 'CategoryController@showSubcategories');
Route::get('product/{category}/{sub_category}', 'CategoryController@showSubcategoryProducts');
Route::get('product/{category}/{sub_category}/{product}', 'CategoryController@showProductDetails');
Route::post('addtocart', 'ShopController@addToCart');
Route::post('updatecart', 'ShopController@updateCart');
Route::view('cart', 'cart');
Route::post('deleteitem', 'ShopController@deleteItem');
Route::get('checkout', 'ShopController@checkout');
Route::post('submitcheckout', 'ShopController@checkoutSubmit');
Route::post('quotequery', 'ShopController@quoteQuery');
Route::get('api/getcart', 'ShopController@getCart');
Route::get('api/updateshipping', 'ShopController@updateShipping');
Route::get('shop', 'CategoryController@shop');
Route::view('contact-us', 'contact-us');
Route::view('about-us', 'about-us');
Route::view('fast-track', 'fast-track');
Route::view('catalog-popup', 'catalog-popup');
Route::view('order-complete', 'orderComplete');
Route::get('ajax-search', 'HomeController@ajaxSearch');
Route::post('fast-track-submit', 'HomeController@fastTrackSubmit');
Route::view('catalog', 'catalog');
Route::post('contact-us-submit', 'HomeController@contactUsSubmit');
Route::get('checkout/networkresponse', 'ShopController@networkResponse');
Route::post('addtocart-ajax', 'ShopController@AJAXAddtoCart');
Route::get('cat-list', 'CategoryController@showCatList');
Route::get('sub-cat-list', 'CategoryController@showSubCatList');
Route::view('add-to-cart-popup', 'add-to-cart-popup');

