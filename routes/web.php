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
//Home Routes
Route::get('/', 'HomeController@index');
Route::get('/branch/filter', 'HomeController@branchFilter');
Route::get('branch/user', 'HomeController@userFilter')->middleware('auth');
Route::get('/home', 'HomeController@index')->middleware('auth');

//Admin Routes
Route::get('/view/employee/{id}', 'AdminController@show')->middleware('auth');
Route::post('/admin/change/{id}', 'AdminController@branch')->middleware('auth');

//Authentication Routes
Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();

//Profile Routes
Route::get('/qr', 'ProfileController@createQR')->middleware('auth');
Route::get('/create/employee', 'ProfileController@create')->middleware('auth');
Route::post('/store/profile', 'ProfileController@store')->middleware('auth');
Route::get('/dashboard', 'ProfileController@index')->middleware('auth');
Route::get('/logger', 'ProfileController@logger')->middleware('auth');
Route::get('/edit/profile/{id}', 'ProfileController@edit')->middleware('auth');
Route::post('/edit/profile/{id}', 'ProfileController@update')->middleware('auth');


//Schedule Routes
Route::get('/scheduler', 'ScheduleController@scheduler')->middleware('auth');
Route::post('/scheduler/{id}', 'ScheduleController@schedule')->middleware('auth');
Route::get('/disable/{id}/{date}/{url}', 'ScheduleController@disable')->middleware('auth');
Route::get('/enable/{id}/{date}/{url}', 'ScheduleController@enable')->middleware('auth');

//Leave Routes
Route::get('/request', 'LeavesController@requestLeave')->middleware('auth');
Route::post('/request/{id}', 'LeavesController@storeLeaveRequest')->middleware('auth');
Route::post('/request/{id}/process', 'LeavesController@process')->middleware('auth');
Route::get('/request/edit/{id}', 'LeavesController@edit')->middleware('auth');
Route::post('/request/update/{id}', 'LeavesController@update')->middleware('auth');
Route::post('/request/remove/{id}', 'LeavesController@remove')->middleware('auth');
Route::get('/view/requests', 'LeavesController@show')->middleware('auth');
Route::get('/leave/type', 'LeavesController@type')->middleware('auth');
Route::get('/leave/type/{type}', 'LeavesController@range')->middleware('auth');

//Weekly Leave Routes
Route::get('/create/weekly', 'WeeklyLeavesController@create')->middleware('auth');
Route::post('/create/weekly/{id}', 'WeeklyLeavesController@store')->middleware('auth');
Route::get('/edit/weekly', 'WeeklyLeavesController@edit')->middleware('auth');
Route::post('/edit/weekly/{id}', 'WeeklyLeavesController@update')->middleware('auth');
Route::get('/show/weekly', 'WeeklyLeavesController@show')->middleware('auth');
Route::post('/weekly/{id}/process', 'WeeklyLeavesController@process')->middleware('auth');

//Branch Routes
Route::get('/branch', 'BranchController@showAll')->middleware('auth');
Route::get('/branch/create', 'BranchController@create')->middleware('auth');
Route::post('/branch/create', 'BranchController@store')->middleware('auth');
Route::get('/branch/delete', 'BranchController@delete')->middleware('auth');
Route::post('/branch/destroy', 'BranchController@destroy')->middleware('auth');
Route::get('/branch/details/{id}', 'BranchController@show')->middleware('auth');

//Late Routes
Route::get('/lates', 'LateController@showAll');
Route::post('/lates/{id}', 'LateController@store');

//Log Routes
Route::get('/logs', 'LogController@show')->middleware('auth');
Route::post('/logs/{id}', 'LogController@store')->middleware('auth');

//Report Routes
Route::get('/test', 'ReportController@hours')->middleware('auth');
