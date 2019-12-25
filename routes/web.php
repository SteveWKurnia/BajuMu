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

use Illuminate\Support\Facades\Route;

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@doLogin');
Route::get('/logout','AuthController@doLogout');

Route::get('/register','AuthController@register');
Route::post('/register/create','AuthController@doRegister');

Route::get('/', 'ItemController@index');
Route::post('/item/store','ItemController@store');
Route::get('/item/create','ItemController@create');
Route::get('/item/{item_id}','ItemController@show');
Route::post('/item/{item_id}','ItemController@addToCart');

Route::get('/cart','CartController@index');
Route::post('/cart/{item_id}', 'CartController@checkout');

Route::get('/profile/{user_id}','UserController@show');
Route::get('/profile','AuthController@login');

