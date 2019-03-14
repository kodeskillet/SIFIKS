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


Route::get('/login', function () {
    return view('login');
});
Route::get('/listkes', function () {
    return view('listkes');
});
Route::get('/listobat', function () {
    return view('listobat');
});
Route::get('/listpenyakit', function () {
    return view('listpenyakit');
});
Route::get('/', function () {
    return view('home');
});

Route::get('/administrator/', function () {
    return view('/admin/dashboard');
});

Route::get('/administrator/obat', function () {
    return view('/admin/obat');
});

Route::get('/administrator/kesehatan', function () {
    return view('/admin/kesehatan');
});
Route::get('/administrator/penyakit', function () {
    return view('/admin/penyakit');
});
Route::get('/administrator/dokter', function () {
    return view('/admin/dokter');
});
Route::get('/administrator/dokter/tambah', function () {
    return view('/admin/tambahDokter');
});
Route::get('/administrator/pertanyaan', function () {
    return view('/admin/pertanyaan');
});


