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


//pages
Route::get('/', 'PageController@index');

Route::get('/about', [
	'as' => 'about-us',
	'uses' => 'PageController@about_us',
]);

Route::get('/contact', [
	'as' => 'contact',
	'uses' => 'ContactController@contact',
]);

Route::post('/contact', 'ContactController@submit_message');



Auth::routes();



Route::middleware('auth')->group(function(){
		//posts management
		Route::get('/management/posts', [
			'as' => 'add',
			'uses' => 'PostController@add',
		]);

		Route::post('/management/posts', 'PostController@commit');

		Route::delete('/management/posts', 'PostController@delete');

		Route::middleware('own.resource')->group(function(){
				Route::get('/management/posts/{id}', [
					'as' => 'edit',
					'uses' => 'PostController@edit',
				]);
				Route::put('/management/posts/{id}', 'PostController@update');
		});

		//account
		Route::get('/account', [
			'as' => 'account',
			'uses' => 'PageController@account',
		]);
});


//ajax
Route::get('/posts/all', 'DataHandleController@all');
Route::get('/posts/filters', 'DataHandleController@filter');


//posts view
Route::get('/posts/{id}', 'PageController@one_post');

Route::get('/posts-list/categories/{slug}', 'CategoryController@index');



//404
Route::fallback('ErrorController@error404');
