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

Route::get('/', 'HomeController@index');

Route::get('/auth', function () {
    return view('auth.index');
});

Route::get('/users', 'UserController@index');
Route::post('/users', 'UserController@add');
Route::get('/users/json', 'UserController@users_json');

Auth::routes();

Route::get('/missions', function () {
    return view('mission.index');
});

Route::get('/groups', 'GroupController@index');
Route::post('/groups', 'GroupController@add');