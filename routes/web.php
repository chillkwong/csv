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

Route::get('/settings/account', 'AccountsController@edit');

Route::patch('/settings/account', 'AccountsController@update');

Route::get('downloadExcel/{type}', 'ExcelController@downloadExcel');
Route::post('/importClients', 'ExcelController@importClients');

Route::get('/upload-excel', 'ExcelController@upload');
Route::get('diamonds', 'DiamondController@selector');

Route::post('diamonds', 'DiamondController@match');

