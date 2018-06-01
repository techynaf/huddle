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

Route::post('/login', 'AttendanceController@login');
Route::get('/view/employee/logged', 'AdminController@viewLoggedIn')->middleware('auth');
Route::get('/view/employee', 'AdminController@showAll')->middleware('auth');
Auth::routes('/view/employee/{id}', 'AdminController@show')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
