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

Route::group(['middleware' => ['authLogin']], function () {
    Route::get('index', function () {
        return view('User.index');
    });
});

Route::group(['prefix' => 'users'],function(){
    Route::get('register/student','User\UserAuthController@showStudentForm');
    Route::post('register/student','User\UserAuthController@registerStudent');
    Route::get('login','User\UserAuthController@showLoginForm');
    Route::post('login','User\UserAuthController@login');
    Route::get('register', 'User\UserAuthController@showRegistrationForm');
    Route::post('register', 'User\UserAuthController@register');
    Route::get('logout','User\UserAuthController@logout');
});

Route::group(['prefix'=>'manage'],function(){
    Route::get('login','Manage\ManageAuthController@showLoginForm');
    Route::post('login','Manage\ManageAuthController@login');
    Route::get('register', 'Manage\ManageAuthController@showregisterForm');
    Route::post('register', 'Manage\ManageAuthController@register');
    Route::get('logout','Manage\ManageAuthController@logout');
});

// Auth::routes();
