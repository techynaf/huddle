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
Route::get('/branch', 'HomeController@branchFilter')->middleware('auth');
Route::get('branch/user', 'HomeController@userFilter')->middleware('auth');
Route::get('/home', 'HomeController@index')->middleware('auth');
Route::get('/auth/logout', 'Auth\AuthController@logout');
Route::get('/dashboard', 'ProfileController@index')->middleware('auth');
Route::post('/store/requests/{id}/manager', 'AdminController@requestProcess')->middleware('auth');
Route::post('/store/requests/{id}/hr', 'AdminController@requestProcess')->middleware('auth');
Route::get('/view/requests', 'AdminController@request')->middleware('auth');
Route::get('/view/employee/logged', 'AdminController@viewLoggedIn')->middleware('auth');
Route::get('/view/employee', 'AdminController@showAll')->middleware('auth');
Route::get('/view/employee/{id}', 'AdminController@show')->middleware('auth');

Route::get('/create/employee', 'ProfileController@create')->middleware('auth');
Route::post('/store/profile', 'ProfileController@store')->middleware('auth');
Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

//Schedule Routes
Route::get('/schedule/create', 'ScheduleController@month')->middleware('auth');
Route::get('/schedule/create/{year}/{month}', 'ScheduleController@day')->middleware('auth');
Route::get('/schedule/create/{year}/{month}/{day}', 'ScheduleController@add')->middleware('auth');
Route::post('/schedule/store/{date}', 'ScheduleController@store')->middleware('auth');
Route::get('/schedule/view', 'ScheduleController@view')->middleware('auth');
Route::get('/schedule/show', 'ScheduleController@showDates')->middleware('auth');
Route::get('/schedule/edit/{id}', 'ScheduleController@edit')->middleware('auth');
Route::post('/schedule/update/{id}', 'ScheduleController@update')->middleware('auth');
Route::get('/scheduler', 'ScheduleController@scheduler')->middleware('auth');
Route::post('/scheduler/{id}', 'ScheduleController@schedule')->middleware('auth');

//Leave Routes
Route::get('/request', 'LeavesController@requestLeave')->middleware('auth');
Route::post('/request/{id}', 'LeavesController@storeLeaveRequest')->middleware('auth');
Route::post('/request/edit/{id}', 'LeavesController@edit')->middleware('auth');
Route::post('/request/update/{id}', 'LeavesController@update')->middleware('auth');
Route::post('/request/remove/{id}', 'LeavesController@remove')->middleware('auth');

//Weekly Leave Routes
Route::get('/create/weekly', 'WeeklyLeavesController@create')->middleware('auth');
Route::post('/create/weekly/{id}', 'WeeklyLeavesController@store')->middleware('auth');
Route::get('/edit/weekly', 'WeeklyLeavesController@edit')->middleware('auth');
Route::post('/edit/weekly/{id}', 'WeeklyLeavesController@update')->middleware('auth');

Route::get('/test', 'ProfileController@idCard')->middleware('auth');
Route::get('/test2', 'ProfileController@idCard')->middleware('auth');
Route::get('/qr', 'ProfileController@createQR')->middleware('auth');