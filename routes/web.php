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

Route::prefix('admin')->group( function() {
    Route::get('/', 'AdminController@index')->name('admin-index');
    Route::get('/article', 'AdminController@article')->name('admin-article');
    Route::get('/thread', 'AdminController@thread')->name('admin-thread');
    Route::get('/admin', 'AdminController@admin')->name('admin-admin');
    Route::get('/doctor', 'AdminController@doctor')->name('admin-doctor');
    Route::get('/member', 'AdminController@member')->name('admin-member');
    Route::get('/hospital', 'AdminController@hospital')->name('admin-hospital');
});

Route::prefix('doctor')->group( function() {
    Route::get('/', 'DoctorController@index')->name('doctor-index');
    Route::get('/article', 'DoctorController@article')->name('doctor-article');
    Route::get('/thread', 'DoctorController@thread')->name('doctor-thread');
});

Route::resources([
    'articles' => 'ArticleController'
]);




