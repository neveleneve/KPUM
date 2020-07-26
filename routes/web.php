<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'GuestController@dashboard')->name('login');
    Route::get('/tentang', function () {
        return view('about');
    });
    Route::get('/adminlogin', function () {
        return view('loginadmin');
    });
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
    Route::post('/tambahtoken', 'AdminController@generateVoterToken');

    Route::get('/admin/administrator', 'AdminController@adminshow');
    Route::post('/tambahadmin', 'AdminController@adminadd');
    
    Route::get('/admin/setting/', function () {
        return view('administrator.setting');
    });
    Route::get('/admin/setting/ubahpassword', function () {
        return view('administrator.ubahpassword');
    });
    Route::post('/ubahpassword', 'AdminController@ubahpass');


    Route::get('/admin/setting/ubahdata', function () {
        return view('administrator.ubahdata');
    });
    Route::post('/ubahdata', 'AdminController@ubahdata');

});

Route::group(['middleware' => 'auth:voter'], function () {
    Route::get('/voter/dashboard', function () {
        return view('voter.dashboard');
    });

    Route::get('/voter/voting', 'VoterController@datacalon');
    Route::post('/voter/vote', 'VoterController@pilih');

    Route::get('/voter/profil', function () {
        return view('voter.profil');
    });
});
