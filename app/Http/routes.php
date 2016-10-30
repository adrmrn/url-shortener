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

// HomeController
Route::get('/', 'HomeController@index');

// UsersController
Route::get('/dashboard', 'UsersController@dashboard');
Route::get('/profile', 'UsersController@profile');
Route::get('/users', 'UsersController@listing')->middleware('permission:users-list-view'); // Check if user have permission to view users' list

// LinksController
Route::get('/links', 'LinksController@index');
Route::get('/links/create', 'LinksController@create');
Route::get('/links/remove', 'LinksController@remove');
Route::get('/links/edit', 'LinksController@edit');
Route::get('/links/preview', 'LinksController@preview');
