<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Products route
 */
Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/products/read', 'ProductsController@getProduct');
Route::get('/products/read/{product_id}', 'ProductsController@getProductById');
Route::post('/products/create', 'ProductsController@addProduct');
Route::post('/products/update/{product_id}', 'ProductsController@updateProduct');
Route::post('/products/delete/{product_id}', 'ProductsController@deleteProduct');

/**
 * Shop routes
 */
Route::get('/shop', 'ShopsController@index')->name('shop');
Route::post('/shop/add_cart', 'ShopsController@addReservation');

/**
 * Cart rountes
 */
Route::get('/cart', 'CartsController@index')->name('cart');

Route::get('/customers', 'CustomersController@index')->name('customers');
