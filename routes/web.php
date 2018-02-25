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

Route::group(['prefix' => 'users'],function(){
    Route::get('login','User\UserAuthController@showLoginForm');
    Route::post('login','User\UserAuthController@login');
    Route::get('register', 'User\UserAuthController@showRegistrationForm');
    Route::post('register', 'User\UserAuthController@register');
    Route::get('logout','User\UserAuthController@logout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
