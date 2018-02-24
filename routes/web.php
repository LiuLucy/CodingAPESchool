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
    Route::get('login','User\LoginController@showLoginForm');
    Route::post('login','User\LoginController@login');
    Route::get('register', 'User\LoginController@showRegistrationForm');
    Route::post('register', 'User\LoginController@register');
    Route::get('logout','User\LoginController@logout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
