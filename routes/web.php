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
    return  redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/google-oauth2callback', 'Auth\LoginController@google');

Route::get('/linkedin-url', 'Auth\LoginController@linkedin_URL');
Route::get('/linkedin-oauth2callback', 'Auth\LoginController@linkedin');

Route::get('/user-update', 'UserController@update');
Route::put('/user-update', 'UserController@store');

Route::resource('/praktikum','PraktikumController');

Route::get('/options', 'HomeController@options');

Route::resource('/status','StatusController');

Route::resource('/state','StateController');

Route::resource('/city','CityController');

Route::resource('/job','JobController');

Route::resource('/bdepartment','BdepartmentController');

Route::resource('/history','HistoryController');

Route::resource('/contacts', 'ContactController');