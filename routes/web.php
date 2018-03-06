<?php

Auth::routes();

Route::redirect('/', '/home');
Route::get('/home', 'homecontroller@index');

Route::get('uitleg', 'homecontroller@uitlegIndex'); 

Route::resource('admin/mainrequirement', 'admin\MainRequirementController', ['except' => 'show']);
Route::resource('admin/instruction', 'admin\InstructionController', ['except' => 'show']);
Route::resource('admin/requirement', 'admin\RequirementController', ['except' => 'show']);
Route::resource('admin/user', 'user\userController');

Route::get('admin/manage', 'admin\admincontroller@manageBookPage');
Route::post('admin/user/rankup', 'user\userController@rankup');

Route::get('admin/manage', 'admin\admincontroller@manageBookPage');

Route::get('admin/mod', 'admin\admincontroller@MainrequirementOfTheDayPage');
Route::put('mod/set', 'admin\admincontroller@setMainrequirementOfTheDay');

Route::post('home/info/store', 'user\userController@storeExtraInfo'); 
Route::get('home/info', 'user\userController@extraInfo'); 
 
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

