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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
