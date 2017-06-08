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
Route::resource('admin', 'admin\admincontroller');
Route::any('admin/manage', 'admin\admincontroller@manage');
route::get('admin/manage/mainrequirement', 'admin\MainRequirementController@index');
route::get('admin/manage/requirement', 'admin\RequirementController@index');
route::get('admin/manage/instruction', 'admin\InstructionController@index');
Route::post('admin/create', 'admin\admincontroller@create');
Route::post('admin/store', 'admin\admincontroller@store');
Route::post('admin/edit', 'admin\admincontroller@edit');
Auth::routes();
