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

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\MainController@indexAction')->name('frontend.home.index');
Route::get('/home', 'Frontend\MainController@indexAction')->name('home');
Auth::routes();
