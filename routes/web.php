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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/top-order-product', 'RepositoryController@topOrderProduct')->name('top-order-product');
Route::get('/top-order-customer', 'RepositoryController@topOrderCustomer')->name('top-order-customer');
Route::get('/top-order-agent', 'RepositoryController@topOrderAgent')->name('top-order-agent');
Route::resource('/order', 'OrderController');