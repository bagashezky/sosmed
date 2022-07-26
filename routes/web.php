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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/dashboard', 'DashboardController@index');
Route::get('/admin/posting', 'PostingController@index');
Route::resource('/admin/posting', 'PostingController');
Route::resource('/admin/dashboard', 'DashboardController');
Route::resource('/admin/profil', 'ProfilController');

