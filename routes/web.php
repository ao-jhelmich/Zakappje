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

Route::get('/', 'homecontroller@index');

Route::resource('home', 'homecontroller');
Route::resource('book', 'bookcontroller');
Route::resource('admin', 'admincontroller');
Route::any('admin/show', 'admincontroller@show');
Auth::routes();
