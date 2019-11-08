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

Auth::routes();

Route::group([ 'prefix' => 'backend'], function(){
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('backend.login');
	Route::post('/login', 'Auth\LoginController@login');
	Route::group(['middleware' => 'auth'], function(){
		Route::get('/', 'Backend\BackendController@index')->name('backend.home');
		Route::get('/form', 'Backend\BackendController@form')->name('backend.form');
		Route::get('/table', 'Backend\BackendController@table')->name('backend.table');
		Route::get('/document', 'Backend\BackendController@document')->name('backend.document');

		Route::get('/menu', 'Backend\MenuController@table')->name('backend.menu');
		Route::post('/menu', 'Backend\MenuController@table')->name('backend.menu.sort');
		Route::get('/menu/add', 'Backend\MenuController@add')->name('backend.menu.add');
		Route::post('/menu/add', 'Backend\MenuController@insert')->name('backend.menu.insert');
		Route::get('/menu/{data}/edit', 'Backend\MenuController@edit')->name('backend.menu.edit');
		Route::post('/menu/{data}/edit', 'Backend\MenuController@update')->name('backend.menu.update');

		Route::get('/user', 'Backend\UserController@table')->name('backend.user');
		Route::post('/user', 'Backend\UserController@table')->name('backend.user.sort');
		Route::get('/user/add', 'Backend\UserController@add')->name('backend.user.add');
		Route::post('/user/add', 'Backend\UserController@insert')->name('backend.user.insert');
		Route::get('/user/{data}/edit', 'Backend\UserController@edit')->name('backend.user.edit');
		Route::post('/user/{data}/edit', 'Backend\UserController@update')->name('backend.user.update');
	});
});
