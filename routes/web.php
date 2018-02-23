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
Route::group(['prefix' => 'user'],function(){
  Route::group(['prefix' => 'auth'],function(){
    Route::get('login','LoginController@show');
    Route::post('login','LoginController@login')->name('user.auth.login');
    Route::get('logout','LoginController@logout');
  });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
