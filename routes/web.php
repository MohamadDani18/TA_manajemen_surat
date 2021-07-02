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

Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::group(['middleware' => ['auth','checkRole:1, 2, 3']], function () {

    Route::resource('user', 'UserController');
    Route::resource('suratmasuk', 'SuratMasukController');
    Route::resource('suratkeluar', 'SuratkeluarController');
    Route::resource('jenissurat', 'JenissuratController');
    Route::resource('klasifikasi', 'KlasifikasiController');
    Route::resource('disposisis', 'DisposisisController');

    //disposisi
    Route::get('/disposisi/{suratmasuk}', 'DisposisiController@index')->name('disposisi.index');
    Route::post('/disposisi/{suratmasuk}', 'DisposisiController@store')->name('disposisi.store');
    Route::get('/disposisi/{suratmasuk}/create', 'DisposisiController@create')->name('disposisi.create');
    Route::get('/disposisi/{suratmasuk}/{id}/edit', 'DisposisiController@edit')->name('disposisi.edit');
    Route::get('/disposisi/{suratmasuk}/{id}', 'DisposisiController@update')->name('disposisi.update');
    Route::delete('disposisi/{suratmasuk}/{id}', 'DisposisiController@destroy')->name('disposisi.destroy');

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('/cetak-laporan', 'SuratmasukController@cetakLaporan')->name('cetak-laporan');
    Route::get('/cetak-laporan-form', 'SuratmasukController@cetakForm')->name('cetak-laporan-form');
    Route::get('/cetak-laporan-filter/{tglawal}/{tglakhir}', 'SuratmasukController@cetakLaporanFilter')->name('cetak-laporan-filter');

});

Route::group(['middleware' => ['auth','checkRole:1, 2']], function () {
    Route::resource('/jenissurat','JenissuratController');
    Route::resource('/user','UserController');

});


