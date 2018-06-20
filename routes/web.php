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

Route::get('/', 'HomeController@index')->middleware('auth');
Route::get('/dashboard', 'ProfileController@index')->middleware('auth');
Route::post('/store/requests/{id}/manager', 'AdminController@requestProcess')->middleware('auth');
Route::post('/store/requests/{id}/hr', 'AdminController@requestProcess')->middleware('auth');
Route::get('/view/requests', 'AdminController@request')->middleware('auth');
Route::get('/view/employee/logged', 'AdminController@viewLoggedIn')->middleware('auth');
Route::get('/view/employee', 'AdminController@showAll')->middleware('auth');
Route::get('/view/employee/{id}', 'AdminController@show')->middleware('auth');
Route::get('/schedule/create', 'ScheduleController@month')->middleware('auth');
Route::get('/schedule/create/{year}/{month}', 'ScheduleController@day')->middleware('auth');
Route::get('/schedule/create/{year}/{month}/{day}', 'ScheduleController@add')->middleware('auth');
Route::post('/schedule/store/{date}', 'ScheduleController@store')->middleware('auth');
Route::get('/schedule/view', 'ScheduleController@view')->middleware('auth');
Route::get('/schedule/show', 'ScheduleController@showDates')->middleware('auth');
Route::get('/ClassSchedule/create')->middleware('auth');
Route::get('/test/schedule', 'AttendanceController@schedule')->middleware('auth');
Route::post('/test/scheduler', 'AttendanceController@scheduler')->middleware('auth');
Route::get('/test/log', 'AttendanceController@log')->middleware('auth');
Route::get('/test/logout', 'AttendanceController@logout')->middleware('auth');
Route::post('/test/logger', 'AttendanceController@logger')->middleware('auth');
Route::get('/view/employee/{id}', 'AdminController@show')->middleware('auth');
Route::get('/request', 'AttendanceController@requestLeave')->middleware('auth');
Route::post('/request/{id}', 'AttendanceController@storeLeaveRequest')->middleware('auth');
Route::get('/create/employee', 'ProfileController@create')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
