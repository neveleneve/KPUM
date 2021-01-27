<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'GuestController@dashboard')->name('login');
    Route::get('/cek-voter', function () {
        return view('about');
    });
    Route::get('/adminlogin', function () {
        return view('loginadmin');
    });

    Route::post('/cek-pemilih', 'GuestController@cekvoter');
    Route::post('/voterloginproses', 'GuestController@loginvoter');
    Route::post('/adminloginproses', 'GuestController@loginadmin');
});

// Route::group(['middleware' => 'auth:admin'], function () {
Route::get('/logout', 'GuestController@logout');
// });

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard');

    Route::get('/admin/datacalon', 'AdminController@calon');
    Route::post('/tambahcalon', 'AdminController@tambahcalon');
    Route::get('/hapuscalon/{id}', 'AdminController@hapuscalon')->name('hapuscalon');

    Route::get('/admin/datapemilih', 'AdminController@index');
    Route::post('/admin/datapemilih', 'AdminController@index');
    Route::post('/admin/datapemilih/hapus', 'AdminController@hapuspemilih');
    Route::post('/tambahtoken', 'AdminController@generateVoterToken');

    Route::get('/admin/administrator', 'AdminController@adminshow');
    Route::get('/admin/administrator/hapusadmin/{id}', 'AdminController@admindelete');
    Route::get('/admin/administrator/view/{id}', 'AdminController@adminview');
    Route::post('/admin/administrator/update', 'AdminController@adminupdate');
    Route::post('/tambahadmin', 'AdminController@adminadd');

    Route::get('/admin/setting/', 'AdminController@adminsettingview');
    Route::get('/admin/setting/ubahpassword', function () {
        return view('administrator.ubahpassword');
    });
    Route::post('/ubahpassword', 'AdminController@ubahpass');
    Route::get('/admin/setting/ubahdata', function () {
        return view('administrator.ubahdata');
    });
    Route::post('/ubahdata', 'AdminController@ubahdata');

    Route::post('/admin/setting/settime', 'AdminController@settime');
});

Route::group(['middleware' => 'auth:voter'], function () {
    Route::get('/voter/dashboard', 'VoterController@index');

    Route::get('/voter/voting', 'VoterController@datacalon');
    Route::post('/voter/vote', 'VoterController@pilih');

    Route::get('/voter/profil', function () {
        return view('voter.profil');
    });
});
