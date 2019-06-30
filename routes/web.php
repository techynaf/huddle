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
Route::get('/schedule/print', 'HomeController@print')->middleware('auth');

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
Route::get('/dashboard', 'ProfileController@index')->middleware('auth')->name('dashboard');
Route::get('/logger', 'ProfileController@logger')->middleware('auth');
Route::get('/edit/profile/{id}', 'ProfileController@edit')->middleware('auth');
Route::post('/edit/profile/{id}', 'ProfileController@update')->middleware('auth');
Route::get('/delete/profile/{id}', 'ProfileController@delete')->middleware('auth');
Route::get('/pin/change/{id}/{stat}', 'ProfileController@pin')->middleware('auth');

//Manager Route
Route::post('/manager-login', 'Controller@managerLogin')->middleware('auth');

//Schedule Routes
Route::get('/scheduler', 'ScheduleController@scheduler')->middleware('auth');
Route::post('/scheduler/{id}', 'ScheduleController@schedule')->middleware('auth');
Route::get('/disable/{id}/{date}/{branch}', 'ScheduleController@disable')->middleware('auth');
Route::get('/enable/{id}/{date}/{branch}', 'ScheduleController@enable')->middleware('auth');

//Leave Routes
Route::get('/create/leave', 'LeavesController@createLeave')->middleware('auth');
Route::post('/create/leave', 'LeavesController@storeLeave')->middleware('auth');
Route::get('/request', 'LeavesController@requestLeave')->middleware('auth');
Route::post('/request/{id}', 'LeavesController@storeLeaveRequest')->middleware('auth');
Route::post('/request/{id}/process', 'LeavesController@process')->middleware('auth');
Route::get('/request/edit/{id}', 'LeavesController@edit')->middleware('auth');
Route::post('/request/update/{id}', 'LeavesController@update')->middleware('auth');
Route::post('/request/remove/{id}', 'LeavesController@remove')->middleware('auth');
Route::get('/view/requests', 'LeavesController@show')->middleware('auth');
Route::get('/leave/type', 'LeavesController@type')->middleware('auth');
Route::get('/leave/type/{type}', 'LeavesController@range')->middleware('auth');
Route::get('/delete/request/{id}', 'LeavesController@delete')->middleware('auth');

// V2.5 Leave Routes
Route::get('/leaves/create', 'LeavesController@create')->name('leaves.create');
Route::post('/leaves/create', 'LeavesController@store')->name('leaves.create');
Route::get('/leaves/types', 'LeavesController@types')->name('leaves.types');
Route::get('/leaves/types/{name}', 'LeavesController@showType')->name('leaves.type');
Route::post('/leaves/types/{name}', 'LeavesController@updateType')->name('leaves.type');
Route::get('/leaves/types/{type}/policies', 'LeavesController@showPolicies')->name('leaves.policies');
Route::post('/leaves/types/{type}/policies', 'LeavesController@updatePolicies')->name('leaves.policies');
Route::get('/leaves/types/{policy}/policies/delete', 'LeavesController@deletePolicies')->name('leaves.policies.delete');

// V2.5 Holiday Routes
Route::get('/holidays', 'HolidaysController@index')->name('holidays.index');
Route::get('/holidays/create', 'HolidaysController@create')->name('holidays.create');
Route::post('/holidays/create', 'HolidaysController@store')->name('holidays.create');
Route::get('/holidays/{holiday}/edit', 'HolidaysController@edit')->name('holidays.edit');
Route::post('/holidays/{holiday}/edit', 'HolidaysController@update')->name('holidays.edit');
Route::get('/holidays/{holiday}/delete', 'HolidaysController@delete')->name('holidays.delete');

// V2.5 Overtimes Routes
Route::get('/overtimes', 'OvertimeController@index')->name('overtimes.index');
Route::post('/overtimes', 'OvertimeController@action')->name('overtimes.action');
Route::get('/overtimes/weekly', 'OvertimeController@weekly')->name('overtimes.weekly.report');

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
Route::get('/lates', 'LateController@showAll')->middleware('auth');
Route::post('/lates/{id}', 'LateController@store')->middleware('auth');

//Log Routes
Route::get('/logs', 'LogController@show')->middleware('auth');
Route::post('/logs/{id}', 'LogController@store')->middleware('auth');

//Report Routes
Route::get('/hour', 'ReportController@hours')->middleware('auth');
Route::get('/late', 'ReportController@lateReport')->middleware('auth');
Route::get('/leave', 'ReportController@leaveReport')->middleware('auth');

//Obtain pins list
Route::get('/pins', 'AdminController@pins')->middleware('auth');

//Assign Barista roles to all
// Route::get('/assign', 'AdminController@assignRole')->middleware('auth');

//Excel Export Routes
Route::post('/export/hour', 'ExportsController@hourExport')->middleware('auth');
Route::post('/export/late', 'ExportsController@lateExport')->middleware('auth');
Route::get('/export/leave', 'ExportsController@leaveExport')->middleware('auth');

Route::get('/test', function () {
    dd();
});