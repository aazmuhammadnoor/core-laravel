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

Route::get('/login', 'Auth\MemberController@showLoginForm')->name('login');
Route::post('/login', 'Auth\MemberController@login');
Route::get('/logout', 'Auth\MemberController@logout');
Route::post('/logout', 'Auth\MemberController@logout')->name('logout');
Route::get('/forgot-password', 'Auth\MemberForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/forgot-password', 'Auth\MemberForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/reset-password/{token}', 'Auth\MemberResetPasswordController@showResetForm')->name('password.reset');
Route::post('/reset-password', 'Auth\MemberResetPasswordController@reset');
Route::get('/register', 'Auth\MemberRegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\MemberRegisterController@register')->name('register');

//Auth::routes();

Route::group([ 'prefix' => 'backend'], function(){
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('backend.login');
	Route::post('/login', 'Auth\LoginController@login');
	Route::post('/logout', 'Auth\LoginController@logout')->name('backend.logout');
	Route::get('/logout', 'Auth\LoginController@logout');
	Route::group(['middleware' => 'auth'], function(){
		Route::get('/', 'Backend\BackendController@index')->name('backend.home');
		Route::get('/form', 'Backend\BackendController@form')->name('backend.form');
		Route::get('/table', 'Backend\BackendController@table')->name('backend.table');
		Route::get('/document', 'Backend\BackendController@document')->name('backend.document');
		
		Route::get('/password', 'Backend\UserController@password')->name('backend.password');
		Route::post('/password', 'Backend\UserController@updatePassword')->name('backend.update.password');

		Route::get('/menu', 'Backend\MenuController@table')->name('backend.menu');
		Route::post('/menu', 'Backend\MenuController@table')->name('backend.menu.sort');
		Route::get('/menu/add', 'Backend\MenuController@add')->name('backend.menu.add');
		Route::post('/menu/add', 'Backend\MenuController@insert')->name('backend.menu.insert');
		Route::get('/menu/{data}/edit', 'Backend\MenuController@edit')->name('backend.menu.edit');
		Route::post('/menu/{data}/edit', 'Backend\MenuController@update')->name('backend.menu.update');
		Route::get('/menu/{data}/delete', 'Backend\MenuController@delete')->name('backend.menu.delete');
		Route::get('/menu/sort', 'Backend\MenuController@sort')->name('backend.menu.sort');
		Route::post('/menu/sort', 'Backend\MenuController@sortUpdate')->name('backend.menu.sort.update');

		Route::get('/user', 'Backend\UserController@table')->name('backend.user');
		Route::post('/user', 'Backend\UserController@table')->name('backend.user.sort');
		Route::get('/user/add', 'Backend\UserController@add')->name('backend.user.add');
		Route::post('/user/add', 'Backend\UserController@insert')->name('backend.user.insert');
		Route::get('/user/{data}/edit', 'Backend\UserController@edit')->name('backend.user.edit');
		Route::post('/user/{data}/edit', 'Backend\UserController@update')->name('backend.user.update');
		Route::get('/user/{data}/delete', 'Backend\UserController@delete')->name('backend.user.delete');

		Route::get('/group', 'Backend\GroupController@table')->name('backend.group');
		Route::post('/group', 'Backend\GroupController@table')->name('backend.group.sort');
		Route::get('/group/add', 'Backend\GroupController@add')->name('backend.group.add');
		Route::post('/group/add', 'Backend\GroupController@insert')->name('backend.group.insert');
		Route::get('/group/{data}/edit', 'Backend\GroupController@edit')->name('backend.group.edit');
		Route::post('/group/{data}/edit', 'Backend\GroupController@update')->name('backend.group.update');
		Route::get('/group/{data}/delete', 'Backend\GroupController@delete')->name('backend.group.delete');

		Route::get('/permission', 'Backend\PermissionController@table')->name('backend.permission');
		Route::post('/permission', 'Backend\PermissionController@table')->name('backend.permission.sort');
		Route::get('/permission/add', 'Backend\PermissionController@add')->name('backend.permission.add');
		Route::post('/permission/add', 'Backend\PermissionController@insert')->name('backend.permission.insert');
		Route::get('/permission/{data}/edit', 'Backend\PermissionController@edit')->name('backend.permission.edit');
		Route::post('/permission/{data}/edit', 'Backend\PermissionController@update')->name('backend.permission.update');
		Route::get('/permission/{data}/delete', 'Backend\PermissionController@delete')->name('backend.permission.delete');


	});
});
