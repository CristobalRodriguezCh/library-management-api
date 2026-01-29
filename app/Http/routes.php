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
    return view('welcome');
});

Route::group(['prefix' => 'api/v1'], function () {
    
    Route::post('auth/register', 'Api\AuthController@register');
    Route::post('auth/login', 'Api\AuthController@login');

    Route::get('users/export', 'Api\UserController@export');
    Route::get('authors/export', 'Api\AuthorController@export');
    Route::get('books/export', 'Api\BookController@export');
    
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('auth/logout', 'Api\AuthController@logout');
        
        Route::resource('users', 'Api\UserController', ['except' => ['create', 'edit']]);
        Route::resource('authors', 'Api\AuthorController', ['except' => ['create', 'edit']]);
        Route::resource('books', 'Api\BookController', ['except' => ['create', 'edit']]);
    });
});