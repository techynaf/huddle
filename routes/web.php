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

Route::get('/add/week', 'HRController@addWeek');
Route::get('/view/employee/logged', 'AdminController@viewLoggedIn');
Route::get('/view/employee', 'AdminController@showAll');
Route::get('/view/employee/{id}', 'AdminController@show');
Route::get('/schedule/create/{id}', 'AdminController@createSchedule');
Route::post('/schedule/store/{id}', 'AdminController@storeSchdedule');
Route::get('/employee/create', 'AdminController@createEmployee');
Route::post('/employee/store', 'AdminController@storeEmployee');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
