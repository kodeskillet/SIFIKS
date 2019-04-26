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


Route::get('/viewarticle', function() {
    return view('viewarticle');
});

Route::get('/searchrs', 'HospitalController@indexUser')->name('search.index.hospital');
Route::post('/searchrs/listhospital/cari', 'HospitalController@searchHospital')->name('search.hospital');
Route::get('/searchrs/listhospital/viewhospital/{id}', 'HospitalController@viewHospital')->name('view.hospital');

Route::get('/viewhospital', function () {
    return view ('viewhospital');
});
Route::get('/lihatsemuars', function() {
    return view('LSRumahSakit');
});


Route::prefix('searchdoctor')->group(function() {
    Route::get('/listdoctors/{specialty}', 'DoctorController@show')->name('list.doctorSpecialty');
    Route::get('/listdoctors/viewdoctor/{id}', 'DoctorController@showDoctor')->name('show.doctor');
    Route::post('/listdoctors/cari','DoctorController@searchDoctor')->name('search.doctors');
    Route::get('/listdoctors', 'SpecializationController@indexUser')->name('list.doctor');
    Route::post('/listdoctors/cari-kota','DoctorController@searchByRadio')->name('search.radio');
    Route::post('/listdoctors/cari-spesialis', 'SpecializationController@searchSpecialty');
    Route::get('/','SpecializationController@indexSearch')->name('search.doctor');
});

Route::get('/mainsearch-article', function() {
    return view('MainSearchArt');
});

Route::get('/mainsearch-doctor', function() {
    return view('MainSearchDoc');
});

Route::get('/mainsearch-hospital', function() {
    return view('MainSearchHosp');
});

Route::get('/articles/{category}', 'ArticleController@listByCat')->name('list.articles');
Route::get('/articles/{category}/{key}','ArticleController@listByName')->name('listName.articles');
Route::post('/articles/{category}/{cari}','ArticleController@search')->name('cari.articles');

Auth::routes();

// User Privileges =======================================================>
Route::prefix('user')->group( function() {
    Route::get('/profile/{query}', 'UserController@profile')->name('user.profile');
    Route::get('/profile/{user}/edit', 'UserController@edit')->name('user.profile.edit');
    Route::put('/profile/{user}/edit', 'UserController@update')->name('user.profile.edit.submit');
    Route::delete('/destroy/me', 'UserController@destroy')->name('user.profile.destroy');
    Route::get('/profile/image/remove', 'UserController@removeImage')->name('user.image.remove');
    Route::get('/profile/password/{user}/edit', 'UserController@editPass')->name('user.password.edit');
    Route::put('/profile/password/{user}/edit', 'UserController@updatePass')->name('user.password.edit.submit');

    Route::get('/thread/create', 'ThreadAskController@create')->name('user.thread.create');
    Route::post('/thread/create', 'ThreadAskController@store')->name('user.thread.store');
    Route::get('/thread/{thread}/edit', 'ThreadAskController@edit')->name('user.thread.edit');
    Route::put('/thread/{thread}/edit', 'ThreadAskController@update')->name('user.thread.edit.submit');
    Route::delete('/thread/{thread}/destroy', 'ThreadAskController@destroy')->name('user.thread.destroy');
});
Route::get('/thread', 'ThreadAskController@index')->name('user.thread.index');
Route::get('/thread/{thread}', 'ThreadAskController@show')->name('user.thread.show');
Route::get('/article/{article}', 'UserController@showArticle')->name('user.article.show');
Route::get('/', 'UserController@index')->name('home');
// END-OF
// User Privileges ======================================================>


// Admin Privileges ======================================================>
Route::prefix('admin')->group( function() {
    // Authentication -->
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    // Admin Controller -->
    Route::get('/profile/{admin}', 'AdminController@profile')->name('admin.profile');
    Route::get('/profile/{admin}/edit', 'AdminController@editProfile')->name('admin.profile.edit');
    Route::put('/profile/{admin}/edit', 'AdminController@updateProfile')->name('admin.profile.edit.submit');
    Route::get('/profile/password/{admin}/edit', 'AdminController@editPass')->name('admin.password.edit');
    Route::put('/profile/password/{admin}/edit', 'AdminController@updatePass')->name('admin.password.edit.submit');
    Route::get('/profile/image/remove', 'AdminController@removeImage')->name('admin.image.remove');
    Route::delete('destroy/me', 'AdminController@destroy')->name('admin.profile.destroy');
    Route::get('/profile/{admin}/log', 'AdminController@log')->name('admin.profile.log');
    Route::resource('admin', 'AdminController')->except([
        'profile', 'editProfile', 'editPass', 'log'
    ]);
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    //Resourced Controller -->
    Route::resources([
        'member' => 'MemberController',
        'doctor' => 'DoctorController',
        'specialty' => 'SpecializationController',
        'hospital' => 'HospitalController'
    ]);

    Route::get('/article', 'ArticleController@index')->name('admin.article.index');
    Route::get('/article/{article}/edit', 'ArticleController@edit')->name('admin.article.edit');
    Route::resource('article', 'ArticleController')->except([
        'index', 'edit'
    ]);

    Route::get('/thread/{query}', 'ThreadController@index')->name('admin.thread.index');
    Route::get('/thread/{thread}/show', 'ThreadController@show')->name('admin.thread.show');
    Route::delete('/thread/{thread}/destroy', 'ThreadController@destroy')->name('admin.thread.destroy');

    //Hospital's Rooms Controller -->
    Route::get('/room/{room_id}/{hospital_id}/edit', 'RoomController@edit')->name('room.edit');
    Route::get('/room/{hospital_id}/room/add', 'RoomController@create')->name('room.create');
    Route::delete('/room/{room_id}/{hospital_id}/destroy', 'RoomController@destroy')->name('room.destroy');
    Route::get('/room/{room_id}/{hospital_id}', 'RoomController@show')->name('room.show');
    Route::resource('room', 'RoomController')->except([
        'edit', 'create', 'destroy', 'show'
    ]);

    // Home
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
});
// END-OF
// Admin Privileges ======================================================>


// Doctor Privileges ======================================================>
Route::prefix('doctor')->group( function() {
    // Authentication -->
    Route::get('/login', 'Auth\DoctorLoginController@showLoginForm')->name('doctor.login');
    Route::post('/login', 'Auth\DoctorLoginController@login')->name('doctor.login.submit');

    // Doc Controller -->
    Route::get('/profile/{doctor}', 'DocController@profile')->name('doctor.profile');
    Route::get('/profile/{doctor}/edit', 'DocController@edit')->name('doctor.profile.edit');
    Route::put('/profile/{doctor}/edit', 'DocController@update')->name('doctor.profile.edit.submit');
    Route::get('/profile/password/{doctor}/edit', 'DocController@editPass')->name('doctor.password.edit');
    Route::put('/profile/password/{doctor}/edit', 'DocController@updatePass')->name('doctor.password.edit.submit');
    Route::get('/profile/image/remove', 'DocController@removeImage')->name('doctor.image.remove');
    Route::delete('/destroy/me', 'DocController@destroy')->name('doctor.profile.destroy');

    Route::get('/article', 'ArticleController@index')->name('doctor.article.index');
    Route::get('/article/{article}/edit', 'ArticleController@edit')->name('doctor.article.edit');
    Route::resource('article', 'ArticleController')->except([
        'index', 'edit'
    ]);

    Route::get('/thread/{query}', 'ThreadController@index')->name('doctor.thread.index');
    Route::get('/thread/{thread}/show', 'ThreadController@show')->name('doctor.thread.show');

    Route::put('/thread/{thread}/answer', 'ThreadAnswerController@store')->name('doctor.thread.answer.submit');
    Route::get('/thread/{thread}/edit', 'ThreadAnswerController@edit')->name('doctor.thread.edit');
    Route::put('/thread/{thread}/edit', 'ThreadAnswerController@update')->name('doctor.thread.edit.submit');
    Route::get('/profile/{doctor}/threads', 'ThreadAnswerController@index')->name('doctor.profile.thread');
    Route::put('/thread/{thread}/destroy', 'ThreadAnswerController@destroy')->name('doctor.thread.answer.destroy');

    // Home -->
    Route::get('/', 'DocController@dashboard')->name('doctor.dashboard');
});
// END-OF
// Doctor Privileges ======================================================>


// Socialite Open-Authentication
Route::get('oauth/{provider}', 'Auth\OAuthController@redirectToProvider')->name('api.login');
Route::get('oauth/{provider}/callback', 'Auth\OAuthController@handleProviderCallback')->name('api.login.submit');
