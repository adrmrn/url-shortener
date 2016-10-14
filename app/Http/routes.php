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

Route::get('/', function () {
    return view('homepage');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/dashboard', function() {
	return view('dashboard');
});
Route::get('/links', function() {
	return view('links.index');
});
Route::get('/links/create', function() {
	return view('links.create');
});
Route::get('/links/remove', function() {
	return view('links.remove');
});
Route::get('/links/edit', function() {
	return view('links.edit');
});
Route::get('/links/preview', function() {
	return view('links.preview');
});
Route::get('/profile', function() {
	return view('users.profile');
});
