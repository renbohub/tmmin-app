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

Route::get('/login', 'App\Http\Controllers\Auth\LoginController@index')->name('login-main');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@post')->name('login-action');
Route::get('/signup', 'App\Http\Controllers\Auth\SignupController@index')->name('signup-main');
Route::post('/signup', 'App\Http\Controllers\Auth\SignupController@post')->name('signup-action');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout-action');
Route::get('/404', 'App\Http\Controllers\Main\ErrorController@e404')->name('e404');
Route::get('/404', 'App\Http\Controllers\Main\ErrorController@e403')->name('e403');


Route::group(['middleware' => ['CheckSession']], function(){
    // Protected routes here
    Route::get('/', 'App\Http\Controllers\Main\DashboardController@index')->name('dashboard');
    Route::get('/detail/{id}', 'App\Http\Controllers\Main\DashboardController@detail')->name('graphic.realtime');
    Route::get('/report-alarm', 'App\Http\Controllers\Main\DashboardController@reportAlarm')->name('alarm.view');
    Route::post('/report-alarm-act', 'App\Http\Controllers\Main\DashboardController@reportAlarmAct')->name('alarm.report');
    Route::get('/report', 'App\Http\Controllers\Main\DashboardController@report')->name('graphic.report');
    Route::post('/report-data', 'App\Http\Controllers\Main\DashboardController@reportData')->name('export.data');
    Route::get('/edit/shift', 'App\Http\Controllers\Main\EditController@editShift')->name('edit.shift');
    Route::get('/edit/user', 'App\Http\Controllers\Main\EditController@editUser')->name('edit.user');
    Route::get('/edit/permission', 'App\Http\Controllers\Main\EditController@editPermission')->name('edit.permission');
    
    
});


Route::post('/realtime-valve', 'App\Http\Controllers\Main\RealtimeDataController@realtimeValve')->name('realtime.valve');
Route::post('/realtime-tank', 'App\Http\Controllers\Main\RealtimeDataController@realtimeTank')->name('realtime.tank');
Route::post('/graphic-tank', 'App\Http\Controllers\Main\RealtimeDataController@graphicTank')->name('graphic.tank');
Route::post('/graphic-tank-detail', 'App\Http\Controllers\Main\RealtimeDataController@graphicTankDetail')->name('graphic.tank.detail');
Route::get('/edit/shift/detail', 'App\Http\Controllers\Main\EditController@editShiftDetail')->name('edit.shift.detail');

Route::get('/edit/permission/detail', 'App\Http\Controllers\Main\EditController@editPermissionDetail')->name('edit.permission.detail');
Route::post('/edit/permission/detail/action', 'App\Http\Controllers\Main\EditController@editPermissionDetailAct')->name('edit.permission.detail.act');
Route::post('/edit/shift/action', 'App\Http\Controllers\Main\EditController@editShiftAct')->name('edit.shift.action');
Route::post('/edit/user/action', 'App\Http\Controllers\Main\EditController@editUserAct')->name('edit.user.action');
Route::post('/edit/permission/action', 'App\Http\Controllers\Main\EditController@editPermissionAct')->name('edit.permission.action');
Route::post('/report-data-excel', 'App\Http\Controllers\Main\DashboardController@reportDataExcel')->name('export.data.excel');

Route::post('/edit/user/detail', 'App\Http\Controllers\Main\EditController@editUserDetail')->name('edit.user.detail');
Route::post('/edit/user/detail/action', 'App\Http\Controllers\Main\EditController@editUserDetailAct')->name('edit.user.detail.action');

Route::post('/delete/user/action', 'App\Http\Controllers\Main\EditController@deleteUserAct')->name('delete.user.action');

Route::get('/add/user', 'App\Http\Controllers\Main\EditController@addUser')->name('add.user.action');
Route::post('/add/user/action', 'App\Http\Controllers\Main\EditController@addUserAct')->name('add.user.act');

Route::post('/edit/user/cp', 'App\Http\Controllers\Main\EditController@editUserCp')->name('edit.user.cp');
Route::post('/edit/user/cp/action', 'App\Http\Controllers\Main\EditController@editUserCpAct')->name('edit.user.cp.act');

Route::get('/realtime-imam016', 'App\Http\Controllers\Main\RealtimeDataController@imam16')->name('imam.0016');