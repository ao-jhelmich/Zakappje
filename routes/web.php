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

use App\Mail\TestMail;

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
   	Route::resource('admin/mainrequirement', 'admin\MainRequirementController');
	Route::resource('admin/instruction', 'admin\InstructionController');
	Route::resource('admin/requirement', 'admin\RequirementController');
	Route::resource('admin/user', 'user\userController');
  	Route::get('admin/manage', 'admin\admincontroller@manageBookPage');
  	Route::post('admin/user/rankup', 'user\userController@rankup');
	Route::resource('admin', 'admin\admincontroller');
	Route::get('admin/manage', 'admin\admincontroller@manageBookPage');
	Route::get('admin/mod', 'admin\admincontroller@MainrequirementOfTheDayPage');
	Route::put('mod/set', 'admin\admincontroller@setMainrequirementOfTheDay');
});

Route::get('send', function () {
    // send an email to "batman@batcave.io"
    Mail::to('jasper.helmich@gmail.com')->send(new TestMail);
    return view('home');
});

//Route for extra info from the user 
Route::post('home/info/store', 'user\userController@storeExtraInfo'); 
Route::get('home/info', 'user\userController@extraInfo'); 
 
Route::get('uitleg', 'homecontroller@uitlegIndex'); 

Route::get('/', 'homecontroller@index');
Route::get('profile/', 'user\profileController@index');
Route::get('book/show/{requirement}', 'bookcontroller@show');
Route::get('check/{requirement}/{user}', 'checkController@addCheckToAdminRow');
Route::get('check/final/{requirement}/{user}/{checkid}', 'checkController@index');
Route::post('edit-user', 'user\userController@update');
Route::get('home', 'homecontroller@index');

// All the resource routes
Route::resource('book', 'bookcontroller');
Route::resource('leaderboard', 'LeaderboardController');

// Post routes
Route::delete('check/{id}', 'checkController@deleteChkFromAdminRow');
Route::post('check/final', 'checkController@addUserHas');
Auth::routes();

Route::get('/{slug}', 'homecontroller@index')->where('slug', '([A-Za-z0-9:/]+)');