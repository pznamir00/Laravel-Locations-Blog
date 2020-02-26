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

Route::get('/contact', [
	'as' => 'contact',
	'uses' => 'PageController@contact',
]);

Route::post('/contact', 'PageController@contact_submit');

Route::get('/about-us', [
	'as' => 'about-us',
	'uses' => 'PageController@about_us',
]);

Route::get('/account', [
	'as' => 'account',
	'uses' => 'PageController@account',
]);



//auth
Auth::routes();



//locations
Route::get('/locations/add', [
	'as' => 'add',
	'uses' => 'LocationController@add',
]);

Route::post('/locations/add', 'LocationController@add_action');

Route::get('/locations/edit/{id}', 'LocationController@edit');

Route::post('/locations/edit/{id}', 'LocationController@edit_action');

Route::post('/locations/delete/{id}', 'LocationController@delete');

Route::get('/locations/{id}', 'PageController@one_location');

Route::get('/category/{slug}', 'FilterController@category');

Route::get('/keywords', 'FilterController@keywords');



//404
Route::fallback('ErrorController@error404');
