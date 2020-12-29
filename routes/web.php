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
//Admin login
Route::get('admin', 'loginController@adminIndex')->name('admin.login');
Route::post('admin', 'loginController@adminPosted');
//Admin-panel
Route::group(['middleware' => 'admin'], function(){

    Route::get("/yes", 'admin_panel\dashboardController@yes')->name('admin.yes');
    Route::get("/admin_panel", 'admin_panel\dashboardController@index')->name('admin.dashboard');
    Route::get('admin/logout', 'loginController@adminLogout')->name('admin.logout');
    

});


//user
