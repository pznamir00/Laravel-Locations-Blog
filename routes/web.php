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

Auth::routes();

Route::get('/contact', [
	'as' => 'contact',
	'uses' => 'ContactController@contact',
]);

Route::post('/contact', 'ContactController@submit_message');

Route::middleware('auth')->group(function(){
	Route::get('/account', [
		'as' => 'account',
		'uses' => 'PageController@account',
	]);

	Route::get('/posts/add', [
		'as' => 'add',
		'uses' => 'PostController@add',
	]);

	Route::post('/posts/add', 'PostController@commit');

	Route::get('/posts/edit/{id}', [
		'as' => 'edit',
		'uses' => 'PostController@edit',
	]);

	Route::put('/posts/edit/{id}', 'PostController@update');

	Route::delete('/posts/delete', 'PostController@delete');
});

Route::get('/about-us', [
	'as' => 'about-us',
	'uses' => 'PageController@about_us',
]);

Route::get('/posts/{id}', 'PageController@one_post');

Route::get('/posts/category/{slug}', 'CategoryController@index');

Route::post('/locations/all', 'DataHandleController@get_all_posts');

Route::post('/filter_locations', 'DataHandleController@get_filtered_posts');



//404
Route::fallback('ErrorController@error404');
