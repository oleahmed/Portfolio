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
//Admin routes

Route::get('/admin/login', 'adminController@showLogin')->name('admin.login.show');
Route::post('/admin/login', 'adminController@login')->name('admin.login');
Route::get('/admin/logout', 'adminController@logout')->name('admin.logout');


Route::group(['middleware'=>'adminCheck'],function(){
Route::get('/admin/dashboard', 'adminController@index')->name('admin.dashboard');
Route::get('/admin/create-post', 'adminController@showPost')->name('admin.post.show');

});


Route::get('/', 'menuController@index')->name('home.show');
Route::get('/about', 'menuController@about')->name('about.show');
Route::get('/portfolio', 'menuController@portfolio')->name('portfolio.show');
Route::get('/contact', 'menuController@contact')->name('contact.show');
Route::get('/research', 'menuController@research')->name('research.show');

// user route
 // Route::get('/', 'formController@show')->name('data.show');
  Route::post('/','formController@store')->name('data.store');