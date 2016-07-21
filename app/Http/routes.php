<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// /cart => go to cartcontroller , and function = index
Route::get('cart','CartController@index');

Route::get('cart/{id}','CartController@show');

Route::get('store','CartController@store');

Route::get('edit','CartController@edit');

Route::get('myId','CartController@myId');

Route::get('delete/{id}','CartController@destroy');

Route::get('addItem/{item_id}/{quantity}','ShopController@addToCart');


Route::get('myCart','ShopController@show');


Route::get('deleteItem/{id}','ShopController@deleteItemFromCart');



Route::auth();

Route::get('/home', 'HomeController@index');
