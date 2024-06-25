<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\AdminController@index')->name('dashboard');

Route::get('/detail/{id}', 'App\Http\Controllers\AdminController@detail')->name('detail');
Route::get('/statistic/{id}', 'App\Http\Controllers\AdminController@statistic')->name('statistic');
Route::get('/report/{id}', 'App\Http\Controllers\AdminController@report')->name('report');
Route::get('/power/{id}', 'App\Http\Controllers\AdminController@power')->name('power');