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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');

    Route::get('/admin', function () {
        return view('dashboard.admin');
    });

    Route::get('/auth', function () {
        return view('auth.index');
    });

    Route::get('/groups', 'GroupController@index');
    Route::post('/groups', 'GroupController@add');

    Route::get('/group/{id}', 'GroupController@show');
    Route::post('/group/new_user', 'GroupController@add_new_users');

    Route::post('/group/new_post', 'GroupPostController@add_post');
    Route::post('/group/new_comment', 'GroupPostController@add_comment');

    Route::get('/missions', 'MissionController@index')->name('mission.index');
    Route::post('/missions', 'MissionController@store')->name('mission.store');

    Route::get('/users', 'UserController@index');
    Route::get('/user/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/user/{id}', 'UserController@update');
    Route::post('/users', 'UserController@add');

    Route::get('/users/api{params?}', 'UserController@api_json');
});
