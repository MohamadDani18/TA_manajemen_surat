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

Route::group(['middleware' => 'auth'], function () {

    Route::resource('user', 'UserController');
    Route::resource('suratmasuk', 'SuratmasukController');
    Route::resource('suratkeluar', 'SuratkeluarController');
    Route::resource('jenissurat', 'JenissuratController');
    Route::resource('disposisi', 'DisposisiController');

    Route::get('home', 'HomeController@index')->name('home');
    
});


