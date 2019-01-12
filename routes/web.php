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
    return view('public.index');
});
Route::get('about', function () {
    return view('public.about');
});
Route::get('portofolio', function () {
    return view('public.portofolio');
});
Route::get('services', function () {
    return view('public.services');
});



Route::group(['middleware'=> 'admin'], function(){
	Route::get('admin', function () {
    return view('admin.index');
	});
	
	Route::resource('admin/user', 'UsersController');
	
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
