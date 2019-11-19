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

//Route::get('/', function () {
//    return view('welcome');
//});

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'Frontend\MainController@indexAction')->name('frontend.main.page');
Route::get('/logout', 'Frontend\MainController@logoutAction')->name('frontend.main.page.logout');


/** Admin dashboard routes */
Route::group(['prefix' => 'backend', 'middleware' => ['isAdmin'],'namespace' => 'Backend'], function() {
    Route::get('/', 'MainController@indexAction')->name('backend.main.page');
});

