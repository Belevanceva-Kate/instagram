<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('login', 'UserController@login');
// Route::post('register', 'UserController@register');



// Маршруты аутентификации
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Маршруты регистрации
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::prefix('/')
	// ->middleware('auth:api')
	->group(function() {
		Route::prefix('/image')
			->group(function() {

				Route::get('/', 'ImageController@collection');

				Route::get('/{id}', 'ImageController@item');

				Route::post('', 'ImageController@create');

				Route::patch('/{id}', 'ImageController@update');

				Route::delete('/{id}', 'ImageController@delete');
		});

		Route::prefix('user')
			->group(function() {

				Route::get('/', 'UserController@collection');

				Route::get('/{id}', 'UserController@item');

				Route::post('', 'UserController@create');

				Route::patch('/{id}', 'UserController@update');

				Route::delete('/{id}', 'UserController@delete');
		});

		Route::prefix('/commnent')
			->group(function() {

				Route::get('/', 'CommentsController@collection');

				Route::get('/{id}', 'CommentsController@item');

				Route::post('', 'CommentsController@create');

				Route::patch('/{id}', 'CommentsController@update');

				Route::delete('/{id}', 'CommentsController@delete');
		});

		Route::prefix('like')
			->group(function() {

				Route::get('/', 'LikeController@collection');

				Route::get('/{id}', 'LikeController@item');

				Route::post('', 'LikeController@create');

				Route::patch('/{id}', 'LikeController@update');

				Route::delete('/{id}', 'LikeController@delete');
		});

		Route::prefix('filter')
			->group(function() {

				Route::get('/', 'FilterController@collection');

				Route::get('/{id}', 'FilterController@item');

				Route::post('', 'FilterController@create');

				Route::patch('/{id}', 'FilterController@update');

				Route::delete('/{id}', 'FilterController@delete');
		});
});