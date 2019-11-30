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
    return redirect()->route('admin.index');
});
Route::get('/addProduct', 'AdminController@index')->name('admin.index');
Route::get('/findProductName', 'AdminController@findProductName')->name('admin.findProductName');
Route::post('/addProduct','AdminController@store')->name('admin.store');
Route::get('/searchproduct','CustomerController@search')->name('customer.search');
Route::post('/searchproduct','CustomerController@find')->name('customer.find');
Route::post('/fetch','CustomerController@fetch')->name('customer.fetch');



