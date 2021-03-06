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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'Auth\RegisterController@showRegistrationForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group( ['middleware' => ['auth']], function() {
	Route::post('search', 'UserController@search');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('posts', 'PostController');
});
