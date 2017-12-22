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

Route::get('/' , 'PagesController@index');
Route::get('/about' , 'PagesController@about');
Route::get('/ourcustomers' , 'PagesController@ourCustomers');
Route::get('/services' , 'PagesController@services');
Route::get('/contacus' , 'PagesController@coutacUs');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/read-data', 'AjaxController@showItemDetails');

// Route::get('/client/{email}', 'clientController@client');
Route::get('/client/new_job_order', 'clientController@new_job_order');
Route::get('/client/new_quotation', 'clientController@new_quotation');
Route::resource('items', 'ItemsController');
Route::resource('orders', 'OrdersController');

Route::get('/orders/create' , 'OrdersController@create');



