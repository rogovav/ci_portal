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

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::post('/admin/building', 'AdminController@building')->name('admin.building');
    Route::post('/admin/client', 'AdminController@client')->name('admin.client');
    Route::post('/admin/subject', 'AdminController@subject')->name('admin.subject');
    Route::post('/admin/position', 'AdminController@position')->name('admin.position');

    Route::get('/groups', 'GroupController@index');
    Route::post('/groups', 'GroupController@add');

    Route::get('/group/{id}', 'GroupController@show');
    Route::post('/group/new_user', 'GroupController@add_new_users');

    Route::post('/group/new_post', 'GroupPostController@add_post');
    Route::post('/group/new_comment', 'GroupPostController@add_comment');

    Route::get('/missions', 'MissionController@index')->name('mission.index');
    Route::post('/missions', 'MissionController@store')->name('mission.store');
    Route::get('/mission/{id}', 'MissionController@show')->name('mission.show');
    Route::post('/mission/{id}', 'MissionController@update')->name('mission.update');
    Route::post('/mission/comment/{id}', 'MissionController@storeComment')->name('mission.storeComment');

    Route::get('/users', 'UserController@index')->name('user.index');
//    Route::get('/user/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/user/{id}', 'UserController@update')->name('user.update');
    Route::get('/user/{id}', 'UserController@show')->name('user.show');
    Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy');
    Route::post('/users', 'UserController@add');

    Route::post('/todo', 'TodoController@store')->name('todo.store');
    Route::get('/todo/{id}', 'TodoController@update')->name('todo.update');

    Route::get('/wiki', 'WikiController@index')->name('wiki.index');
    Route::post('/wiki', 'WikiController@store')->name('wiki.store');
    Route::get('/wiki/{id}', 'WikiController@show')->name('wiki.show');
    Route::post('/wiki/{id}', 'WikiController@update')->name('wiki.update');
    Route::delete('/wiki/{id}', 'WikiController@destroy')->name('wiki.destroy');


//    Route::get('/users/api{params?}', 'UserController@api_json');

    Route::get('/rest', 'RestController@index')->name('rest.index');
    Route::post('/rest', 'RestController@store')->name('rest.store');
    Route::post('/rest/{id}', 'RestController@update')->name('rest.update');

    Route::get('/calendar', 'CalendarController@index')->name('calendar.index');

    Route::get('/reports', function () {
        return view('report.index');
    });

    Route::get('/{url}', 'HomeController@url')->name('home.url');
});
