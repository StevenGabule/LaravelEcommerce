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

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('product/{id}', [
   'uses' => 'FrontEndController@singleProduct',
    'as' => 'product.single'
]);

Auth::routes();

Route::get('/product', [
   'uses' => 'ProductsController@index',
    'as' => 'Products'
]);

Route::post('/cart/add', [
   'uses' => 'ShoppingController@add_to_cart',
    'as' => 'cart.add'
]);

Route::get('/cart', [
   'uses' => 'ShoppingController@cart',
    'as' => 'cart'
]);
Route::get('/cart/delete/{id}', [
    'uses' => 'ShoppingController@cart_delete',
    'as' => 'cart.delete'
]);

Route::get('/cart/increment/{id}/{qty}', [
   'uses' => 'ShoppingController@increment',
    'as' => 'cart.increment'
]);

Route::get('/cart/decrement/{id}/{qty}', [
    'uses' => 'ShoppingController@decrement',
    'as' => 'cart.decrement'
]);

Route::get('/cart/rapid/add/{id}', [
    'uses' => 'ShoppingController@rapid',
    'as' => 'cart.rapid'
]);

Route::get('/cart/checkout', [
   'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'
]);

Route::post('/cart/checkout', [
    'uses' => 'CheckoutController@pay',
    'as' => 'cart.checkout'
]);



Route::get('/product/create', [
    'uses' => 'ProductsController@create',
    'as' => 'Products.create'
]);

Route::post('/product/store', [
    'uses' => 'ProductsController@store',
    'as' => 'Products.store'
]);


Route::get('/product/edit/{id}', [
    'uses' => 'ProductsController@edit',
    'as' => 'Products.edit'
]);

Route::post('/product/update/{id}', [
    'uses' => 'ProductsController@update',
    'as' => 'Products.update'
]);

Route::get('/product/delete/{id}', [
    'uses' => 'ProductsController@destroy',
    'as' => 'Products.destroy'
]);

Route::get('/home', 'HomeController@index')->name('home');
