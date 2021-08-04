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
    return view('auth.login');
});


Auth::routes();

Route::group(['middleware' => ['auth','checkRole:admin,pegawai,kepala']], function () {

    Route::resource('suratmasuk', 'SuratMasukController');
    Route::resource('suratkeluar', 'SuratkeluarController');
    Route::resource('surat', 'SuratController');

    // Route::resource('klasifikasi', 'KlasifikasiController');
    // Route::resource('disposisi', 'DisposisiController');

    //disposisi
    Route::get('/disposisi/{suratmasuk}', 'DisposisiController@index')->name('disposisi.index');
    // Route::post('/disposisi/{suratmasuk}', 'DisposisiController@store')->name('disposisi.store');
    // Route::get('/disposisi/{suratmasuk}/create', 'DisposisiController@create')->name('disposisi.create');
    // Route::get('/disposisi/{suratmasuk}/{id}/edit', 'DisposisiController@edit')->name('disposisi.edit');
    // Route::get('/disposisi/{suratmasuk}/{id}', 'DisposisiController@update')->name('disposisi.update');
    // Route::delete('disposisi/{suratmasuk}/{id}', 'DisposisiController@destroy')->name('disposisi.destroy');
    Route::get('/disposisi/{suratmasuk}/{id}/cetak', 'DisposisiController@cetak')->name('disposisi.cetak');

    Route::get('home', 'HomeController@index')->name('home');

    Route::get('/cetak-laporan', 'SuratmasukController@cetakLaporan')->name('cetak-laporan');
    Route::get('/cetak-laporan-form', 'SuratmasukController@cetakForm')->name('cetak-laporan-form');
    Route::get('/cetak-laporan-filter/{tglawal}/{tglakhir}', 'SuratmasukController@cetakLaporanFilter')->name('cetak-laporan-filter');

});

Route::group(['middleware' => ['auth','checkRole:admin']], function () {
    Route::resource('jenissurat','JenissuratController');
    Route::resource('user','UserController');
    Route::resource('klasifikasi', 'KlasifikasiController');
    Route::resource('unitkerja', 'UnitkerjaController');


});

Route::group(['middleware' => ['auth','checkRole:kepala']], function () {
    Route::get('verifikasi', 'SuratController@verifikasi')->name('surat.verifikasi');
    // Route::get('/disposisi/{suratmasuk}', 'DisposisiController@index')->name('disposisi.index');
    Route::post('/disposisi/{suratmasuk}', 'DisposisiController@store')->name('disposisi.store');
    Route::get('/disposisi/{suratmasuk}/create', 'DisposisiController@create')->name('disposisi.create');
    Route::get('/disposisi/{suratmasuk}/{id}/edit', 'DisposisiController@edit')->name('disposisi.edit');
    Route::get('/disposisi/{suratmasuk}/{id}', 'DisposisiController@update')->name('disposisi.update');
    Route::delete('disposisi/{suratmasuk}/{id}', 'DisposisiController@destroy')->name('disposisi.destroy');
    // Route::get('/disposisi/{suratmasuk}/{id}/cetak', 'DisposisiController@cetak')->name('disposisi.cetak');
});

Route::group(['middleware' => ['auth','checkRole:pegawai']], function () {
    Route::get('permintaan-surat', 'SuratController@surats')->name('surat.permintaan');
    Route::get('/surat/create', 'SuratController@create')->name('surat.create');
});
