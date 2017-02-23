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
});

