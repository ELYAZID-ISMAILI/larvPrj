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
//Admin login
Route::get('admin', 'loginController@adminIndex')->name('admin.login');
Route::post('admin', 'loginController@adminPosted');
//Admin-panel
Route::group(['middleware' => 'admin'], function(){

    Route::get("/yes", 'admin_panel\dashboardController@yes')->name('admin.yes');
    Route::get("/admin_panel", 'admin_panel\dashboardController@index')->name('admin.dashboard');
    Route::get('admin/logout', 'loginController@adminLogout')->name('admin.logout');
    

});

Route::get('/login', 'loginController@userIndex')->name('user.login');
Route::post('/login', 'loginController@userPosted');

//user
Route::get('/', 'user\userController@index')->name('user.home');
Route::get('/product/{id}', 'user\userController@view')->name('user.product');

Route::get('/search', 'user\userController@search')->name('user.search');
Route::get('/search?c={id}', 'user\userController@view')->name('user.search.cat');

Route::get('/view/{id}', 'user\userController@view')->name('user.view');
Route::post('/view/{id}', 'user\userController@post');

Route::post('/edit_cart', 'user\userController@editCart')->name('user.editCart');
Route::post('/delete_item_from_cart', 'user\userController@deleteCartItem')->name('user.deleteCartItem');


Route::get('/logout', 'loginController@userLogout')->name('user.logout');


Route::group(['middleware' => 'user'], function(){
    Route::get('/history', 'user\userController@history')->name('user.history');
    });