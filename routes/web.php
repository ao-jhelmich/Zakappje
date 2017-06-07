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

Route::post('book/show', 'bookcontroller@show');
Route::resource('home', 'homecontroller');
Route::resource('book', 'bookcontroller');
Route::resource('admin', 'admincontroller');
Route::any('admin/manage', 'admincontroller@manage');
Route::post('admin/create', 'admincontroller@create');
Route::post('admin/store', 'admincontroller@store');
Auth::routes();
