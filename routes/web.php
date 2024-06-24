<?php

use Illuminate\Support\Facades\Route;

Route::get('/detail/{id}', 'App\Http\Controllers\AdminController@detail')->name('detail');
Route::get('/', 'App\Http\Controllers\AdminController@index')->name('dashboard');