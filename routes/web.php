<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'login@index')->name('login')->middleware('guest');
// Route::get('/register', 'login@register');
// Route::post('/login', 'login@authenticate');
// Route::get('/logout', 'login@logout');
// Route::post('/buat-akun', 'login@store');

// Route::get('/buku', 'buku@index')->middleware('auth');
// Route::post('/simpan-buku', 'buku@save')->middleware('auth');
// Route::get('/hapus-buku/{id}', 'buku@delete')->middleware('auth');
// Route::get('/edit/{id}', 'buku@edit')->middleware('auth');
// Route::post('/update-buku/{id}', 'buku@update');
// Route::get('/peminjam', 'peminjam@index');
// Route::post('/pinjam-buku', 'peminjam@insert');
// Route::get('/edit-peminjam/{id}', 'peminjam@edit');
// Route::post('/update-peminjam/{id}', 'peminjam@update');
// Route::get('/hapus-peminjam/{id}', 'peminjam@delete');
// Route::get('/mahasiswa', 'mahasiswa@index');
// Route::post('/input-mahasiswa', 'mahasiswa@store');
// Route::get('/edit-mahasiswa/{id}', 'mahasiswa@edit');
// Route::post('/update-mahasiswa/{id}', 'mahasiswa@update');
// Route::get('/hapus-mahasiswa/{id}', 'mahasiswa@destroy');
Route::get('/', 'login@index')->name('login');
Route::post('/login', 'login@authenticate');
Route::get('/logout', 'login@logout');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/register', 'login@register');
    Route::post('/buat-akun', 'login@store');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/buku', 'buku@index');
    Route::post('/simpan-buku', 'buku@save');
    Route::get('/hapus-buku/{id}', 'buku@delete');
    Route::get('/edit/{id}', 'buku@edit');
    Route::post('/update-buku/{id}', 'buku@update');
    Route::get('/peminjam', 'peminjam@index');
    Route::post('/pinjam-buku', 'peminjam@insert');
    Route::get('/edit-peminjam/{id}', 'peminjam@edit');
    Route::post('/update-peminjam/{id}', 'peminjam@update');
    Route::get('/hapus-peminjam/{id}', 'peminjam@delete');
    Route::get('/mahasiswa', 'mahasiswa@index');
    Route::post('/input-mahasiswa', 'mahasiswa@store');
    Route::get('/edit-mahasiswa/{id}', 'mahasiswa@edit');
    Route::post('/update-mahasiswa/{id}', 'mahasiswa@update');
    Route::get('/hapus-mahasiswa/{id}', 'mahasiswa@destroy');
    Route::get('/dipinjam', 'peminjam@dipinjam');
});