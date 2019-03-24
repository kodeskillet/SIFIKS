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

Route::get('/viewarticle', function() {
    return view('viewarticle');
});

Route::get('/SearchDokter', function() {
    return view('SearchDokter');
});

Route::get('/SearchRS', function() {
    return view('SearchRS');
});

Route::get('/articles/{category}', 'ArticleController@listByCat')->name('list.articles');

Auth::routes();

Route::get('/home', 'UserController@index')->name('home');

Route::prefix('admin')->group( function() {
    // Auth -->
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    // Pages -->
    Route::get('/article', 'AdminController@article')->name('admin-article');
    Route::get('/thread', 'AdminController@thread')->name('admin-thread');
    Route::get('/admin', 'AdminController@admin')->name('admin-admin');
    Route::get('/doctor', 'AdminController@doctor')->name('admin-doctor');
    Route::get('/member', 'AdminController@member')->name('admin-member');
    Route::get('/hospital', 'AdminController@hospital')->name('admin-hospital');

    // Create Admin
    Route::get('/admin/create', 'AdminController@create')->name('admin.create');
    Route::post('/admin/create','AdminController@store')->name('admin.post');

    //Create Doctor
    Route::get('/doctor/create', 'AdminController@createdoctor')->name('doctor.create');
    Route::post('/admin/create','AdminController@storedoctor')->name('doctor.store');

    // Article Access
    Route::resource('articles', 'ArticleController');


    // Home
    Route::get('/', 'AdminController@index')->name('admin.index');
});

Route::prefix('doctor')->group( function() {
    // Auth -->
    Route::get('/login', 'Auth\DoctorLoginController@showLoginForm')->name('doctor.login');
    Route::post('/login', 'Auth\DoctorLoginController@login')->name('doctor.login.submit');

    // Pages
    Route::get('/article', 'DoctorController@article')->name('doctor-article');
    Route::get('/thread', 'DoctorController@thread')->name('doctor-thread');

    // Article Access
    Route::resource('articles', 'ArticleController');

    // Home
    Route::get('/', 'DoctorController@index')->name('doctor-index');

});




