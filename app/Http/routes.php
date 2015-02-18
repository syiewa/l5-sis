<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'Admin\DataStatisController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin'], function() {
    Route::resource('datastatis', 'Admin\DataStatisController');
    Route::resource('berita', 'Admin\BeritaController');
    Route::resource('pengumuman', 'Admin\PengumumanController');
    Route::resource('agenda', 'Admin\AgendaController');
    Route::resource('kelas', 'Admin\KelasController');
    Route::resource('kelas/{id}/siswa', 'Admin\SiswaController');
    Route::resource('pegawai', 'Admin\PegawaiController');
    Route::resource('polling', 'Admin\PollingController');
    Route::resource('polling/{id}/jawaban', 'Admin\JawabanController');
    Route::resource('galeri', 'Admin\GaleriController');
});

Route::group(['prefix' => 'api'], function() {
    Route::get('datastatis', 'Admin\DataStatisController@apiDataStatis');
    Route::get('datastatis/{id}', 'Admin\DataStatisController@show');
    Route::get('menu', 'Admin\DataStatisController@apiCreateMenu');

    Route::get('berita', 'Admin\BeritaController@apiBerita');
    Route::get('berita/{id}', 'Admin\BeritaController@show');

    Route::get('pengumuman', 'Admin\PengumumanController@apiPengumuman');
    Route::get('pengumuman/{id}', 'Admin\PengumumanController@show');

    Route::get('agenda', 'Admin\AgendaController@apiAgenda');
    Route::get('agenda/{id}', 'Admin\AgendaController@show');

    Route::get('kelas', 'Admin\KelasController@apiKelas');
    Route::get('kelas/{id}', 'Admin\KelasController@show');

    Route::get('kelas/{id}/siswa', 'Admin\SiswaController@apiSiswa');
    Route::get('siswa/{id}', 'Admin\SiswaController@show');
    Route::get('kelasdropdown', 'Admin\KelasController@apiCreateKelas');

    Route::get('pegawai', 'Admin\PegawaiController@apiPegawai');
    Route::get('pegawai/{id}', 'Admin\PegawaiController@show');

    Route::get('polling', 'Admin\PollingController@apiPolling');
    Route::get('polling/{id}', 'Admin\PollingController@show');
    Route::get('pollingdropdown', 'Admin\PollingController@apiCreatePolling');

    Route::get('polling/{id}/jawaban', 'Admin\JawabanController@apiJawaban');
    Route::get('jawaban/{id}', 'Admin\JawabanController@show');

    Route::get('galeri', 'Admin\GaleriController@apiGaleri');
    Route::get('galeri/{id}', 'Admin\GaleriController@show');
    Route::get('galeridropdown', 'Admin\GaleriController@apiCreateGaleri');
});
