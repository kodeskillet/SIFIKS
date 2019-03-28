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

Route::get('/', 'HomeController@index');
Route::get('/{id}', 'HomeController@show')->name('display.article');

Route::get('/viewarticle', function() {
    return view('viewarticle');
});

Route::get('/SearchDokter', function() {
    return view('SearchDokter');
});

Route::get('/SearchRS', function() {
    return view('SearchRS');
});

// Route::get('/User', function() {
//     return view('userlayout');
// });

// Route::get('/User/Edit', function() {
//     return view('EditUser');
// })->name('edituser');

Route::get('/listdoctor', function() {
    return view('listDoctor');
});

Route::get('/listhospital', function() {
    return view('listHospital');
});

Route::get('/articles/{category}', 'ArticleController@listByCat')->name('list.articles');

Auth::routes();

Route::prefix('home')->group(function(){

    Route::get('/', 'UserController@index')->name('home');
    Route::get('/{id}','UserController@show')->name('user');
    Route::get('/{id}/edit','UserController@edit')->name('edituser');
    Route::put('/{id}','UserController@update')->name('updateuser');
    Route::get('/{id}/editpassword','UserController@editpassword')->name('passworduser');
});
// Admin Privileges ======================================================>
Route::prefix('admin')->group( function() {
    // Authentication -->
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    // Admin Controller -->
    Route::resource('admin', 'AdminController');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    //Resourced Controller -->
    Route::resources([
        'member' => 'MemberController',
        'doctor' => 'DoctorController',
        'specialty' => 'SpecializationController',
        'article' => 'ArticleController',
        'hospital' => 'HospitalController',
        'thread' => 'ThreadController',
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

    // Article Access -->
    Route::resources([
        'article' => 'ArticleController',
        'doc' => 'DocController'
    ]);

    // Home -->
    Route::get('/', 'DoctorController@index')->name('doc.index');

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




