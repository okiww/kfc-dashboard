<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/password/reset', [ 'as' => 'password.reset', 'uses' => 'Auth\PasswordController@resetPassword']);
Route::post('/password/update', 'Auth\PasswordController@update_password');
Route::get('/password/update', [ 'as' => 'password.update', 'uses' => 'Auth\PasswordController@resetPassword']);
Route::get('index/{email}/{token}', [ 'as' => 'password.index', 'uses' => 'Auth\PasswordController@index']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\AuthController@login']);


Route::group(['as' => 'admin::', 'namespace' => 'Admin'], function () {
	Route::get('/', 'AdminController@index');	

	Route::get('/admin', 'AdminController@index');		
	Route::resource('tmp_tpos_bill_item', 'TmptposbillitemController');

	Route::get('tmp-tpos-bill', ['as' => 'tmptposbill.index', 'uses' => 'TmptposbillController@index']);
	Route::get('tmp-tpos-bill/show/{type}', ['as' => 'tmptposbill.show', 'uses' => 'TmptposbillController@show']);

	Route::get('tmp-tpos-bill-item', ['as' => 'tmptposbillitem.index', 'uses' => 'TmptposbillitemController@index']);
	Route::get('tmp-tpos-bill-item/show/{type}', ['as' => 'tmptposbillitem.show', 'uses' => 'TmptposbillitemController@show']);
});

Route::group(['as' => 'admin::', 'namespace' => 'User'], function () {
	Route::get('/user', ['as' => 'user.index', 'uses' => 'UserController@index']);
	Route::get('/user/create', ['as' => 'user.create', 'uses' => 'UserController@create']);
	Route::get('user/show/{type}', ['as' => 'user.show', 'uses' => 'UserController@show']);
	Route::post('/user/register', ['as' => 'user.register', 'uses' => 'UserController@store']);	
	Route::delete('/user/delete/{id}', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);
	Route::get('/user/edit/{id}', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
	Route::post('/user/update/', ['as' => 'user.update', 'uses' => 'UserController@update']);		
});

