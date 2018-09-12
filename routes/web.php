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

Route::get('/', 'HomeController@index');

Route::get('/auth', function () {
    return view('auth.index');
});

Route::get('/users', 'UserController@index');

Route::get('/mission', function () {
    return view('mission.index');
});

Route::get('/user/show', function (){
    return view('user.show');
});

Route::get('/group', function (){
    return view('group.index');
});
