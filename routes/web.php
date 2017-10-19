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

Route::prefix('home/anggota')->group(function() {
	Route::get('/', 'AnggotaController@index')->name('index.anggota')->middleware('auth');
	Route::get('/createAnggota', 'AnggotaController@create')->name('anggota.create')->middleware('auth');
	Route::post('/storeAnggota', 'AnggotaController@store')->name('anggota.store')->middleware('auth');
	Route::get('/editAnggota/{id}', 'AnggotaController@edit')->name('anggota.edit')->middleware('auth');
	Route::post('/updateAnggota/{id}', 'AnggotaController@update')->name('anggota.update')->middleware('auth');
	Route::get('/hapusAnggota/{id}', 'AnggotaController@destroy')->name('anggota.destroy')->middleware('auth');
});

Route::prefix('home/petugas')->group(function() {
	Route::get('/', 'PetugasController@index')->name('index.petugas')->middleware('auth');
	Route::get('/createPetugas', 'PetugasController@create')->name('petugas.create')->middleware('auth');
	Route::post('/storePetugas', 'PetugasController@store')->name('petugas.store')->middleware('auth');
	Route::get('/editPetugas/{id}', 'PetugasController@edit')->name('petugas.edit')->middleware('auth');
	Route::post('/updatePetugas/{id}', 'PetugasController@update')->name('petugas.update')->middleware('auth');
	Route::get('/hapusPetugas/{id}', 'PetugasController@destroy')->name('petugas.destroy')->middleware('auth');
});

Route::prefix('home/simpanan')->group(function() {
	Route::get('/', 'SimpananController@index')->name('index.simpanan')->middleware('auth');
	Route::get('/createSimpanan', 'SimpananController@create')->name('simpanan.create')->middleware('auth');
	Route::post('/storeSimpanan', 'SimpananController@store')->name('simpanan.store')->middleware('auth');
	Route::get('/editSimpanan/{id}', 'SimpananController@edit')->name('simpanan.edit')->middleware('auth');
	Route::post('/updateSimpanan/{id}', 'SimpananController@update')->name('simpanan.update')->middleware('auth');
	Route::get('/hapusSimpanan/{id}', 'SimpananController@destroy')->name('simpanan.destroy')->middleware('auth');
});

Route::prefix('home/pinjaman')->group(function() {
	Route::get('/', 'PeminjamanController@index')->name('index.pinjaman')->middleware('auth');
	Route::get('/createPinjaman', 'PeminjamanController@create')->name('pinjaman.create')->middleware('auth');
	Route::post('/storePinjaman', 'PeminjamanController@store')->name('pinjaman.store')->middleware('auth');
	Route::get('/editPinjaman/{id}', 'PeminjamanController@edit')->name('pinjaman.edit')->middleware('auth');
	Route::post('/updatePinjaman/{id}', 'PeminjamanController@update')->name('pinjaman.update')->middleware('auth');
	Route::get('/hapusPinjaman/{id}', 'PeminjamanController@destroy')->name('pinjaman.destroy')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
