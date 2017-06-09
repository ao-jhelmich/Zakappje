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

// All the resource routes
Route::resource('admin/mainrequirement', 'admin\MainRequirementController');
Route::resource('admin/instruction', 'admin\InstructionController');
Route::resource('admin/requirement', 'admin\RequirementController');
Route::resource('home', 'homecontroller');
Route::resource('book', 'bookcontroller');
Route::resource('admin', 'admin\admincontroller');

// Post routes
Route::get('book/show/{requirement}', 'bookcontroller@show');
Auth::routes();
