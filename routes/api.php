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

Auth::routes();

// Маршруты аутентификации
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// // Маршруты регистрации
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/')->group(function() {
	Route::prefix('/image')->group(function() {
		Route::get('/', 'ImageController@showAll');
		Route::get('/{id}', 'ImageController@showOne');
		Route::post('/', 'ImageController@createOne');
		Route::patch('/{id}', 'ImageController@updateOne');
		Route::delete('/{id}', 'ImageController@deleteOne');
	});

	Route::prefix('/user')->group(function() {
		Route::get('/', 'UserController@showAll');
		Route::get('/{id}', 'UserController@showOne');
		Route::post('/', 'UserController@createOne');
		Route::patch('/{id}', 'UserController@updateOne');
		Route::delete('/{id}', 'UserController@deleteOne');
	});

	Route::prefix('/comment')->group(function() {
		Route::get('/', 'CommentController@showAll');
		Route::get('/{id}', 'CommentController@showOne');
		Route::post('/', 'CommentController@createOne');
		Route::patch('/{id}', 'CommentController@updateOne');
		Route::delete('/{id}', 'CommentController@deleteOne');
	});

	Route::prefix('/like')->group(function() {
		Route::get('/', 'LikeController@showAll');
		Route::get('/{id}', 'LikeController@showOne');
		Route::post('/', 'LikeController@createOne');
		Route::patch('/{id}', 'LikeController@updateOne');
		Route::delete('/{id}', 'LikeController@deleteOne');
	});

	Route::prefix('/filter')->group(function() {
		Route::get('/', 'FilterController@showAll');
		Route::get('/{id}', 'FilterController@showOne');
		Route::post('/', 'FilterController@createOne');
		Route::patch('/{id}', 'FilterController@updateOne');
		Route::delete('/{id}', 'FilterController@deleteOne');
	});
});
