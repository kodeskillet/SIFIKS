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

Route::get('/listdoctor', function() {
    return view('listDoctor');
});

Route::get('/listhospital', function() {
    return view('listHospital');
});

Route::get('/articles/{category}', 'ArticleController@listByCat')->name('list.articles');

Auth::routes();

Route::get('/home', 'UserController@index')->name('home');


// Admin Privileges ======================================================>
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

    // Create Doctor
    Route::get('/doctor/create', 'AdminController@createdoctor')->name('doctor.create');
    Route::post('/doctor/create','AdminController@storedoctor')->name('doctor.store');

    //Delete Doctor
    Route::delete('/doctor/{id}','AdminController@destroydoctor')->name('doctor.destroy');

    //Edit Doctor
    Route::get('/doctor/{id}/edit','AdminController@editdoctor')->name('doctor.edit');
    Route::put('/doctor/{id}','AdminController@updatedoctor')->name('doctor.update');

    // Article Access
    Route::resource('articles', 'ArticleController');


    // Home
    Route::get('/', 'AdminController@index')->name('admin.index');
});
// END-OF
// Admin Privileges ======================================================>


// Doctor Privileges ======================================================>
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
// END-OF
// Doctor Privileges ======================================================>


// Socialite Open-Authentication
Route::get('oauth/{provider}', 'Auth\OAuthController@redirectToProvider')->name('api.login');
Route::get('oauth/{provider}/callback', 'Auth\OAuthController@handleProviderCallback')->name('api.login.submit');


Route::get('/ask', function() {
    return view('AskToDoctor');
});
Route::get('/ask-detail', function() {
    return view('DetailQuestions');
});

Route::get('/admin/profile', function() {
    return view('/pages/profile');
});

Route::get('/admin/profile/article', function() {
    return view('/pages/ext/profile-articles');
});
Route::get('/admin/profile/edit', function() {
    return view('/pages/ext/edit-profile');
});
Route::get('/admin/profile/password', function() {
    return view('/pages/ext/edit-password');
});




