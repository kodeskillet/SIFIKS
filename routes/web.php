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

Route::get('/', function() {
    return view('home');
});

Auth::routes();

Route::get('/home', 'UserController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin-index');
Route::get('/admin/article', 'AdminController@article')->name('admin-article');
Route::get('/admin/thread', 'AdminController@thread')->name('admin-thread');


Route::get('/doctor', 'DoctorController@index')->name('doctor-index');
Route::get('/doctor/article', 'DoctorController@article')->name('doctor-article');
Route::get('/doctor/thread', 'DoctorController@thread')->name('doctor-thread');
