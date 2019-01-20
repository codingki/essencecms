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


Route::group(['middleware' => 'auth'], function(){

	Route::resource('admin/profile', 'ProfileController');

		Route::group(['middleware'=> 'active'], function(){
			Route::get('admin', function () {
		    return view('admin.index');
			});
			Route::get('admin/categories/edit/{id}', ['as' => 'admin.categories.edit', 'uses' => 'CategoryController@edit']);
			Route::get('admin/posts/edit/{id}', ['as' => 'admin.posts.edit', 'uses' => 'PostsController@edit']);
			Route::get('admin/testimonials/edit/{id}', ['as' => 'admin.testimonials.edit', 'uses' => 'testimonialController@edit']);
			
			Route::resource('admin/categories', 'CategoryController');
			Route::resource('admin/testimonials', 'testimonialController');
			Route::resource('admin/portofolio', 'PortofolioController');
			Route::resource('admin/posts', 'PostsController');

			
			Route::group(['middleware'=> 'admin'], function(){
				Route::resource('admin/users', 'UsersController');
				Route::get('admin/users/updateActive/{id}', ['as' => 'admin.users.updateActive', 'uses' => 'UsersController@updateActive']);
				Route::get('admin/users/updateAdmin/{id}', ['as' => 'admin.users.updateAdmin', 'uses' => 'UsersController@updateAdmin']);
			});

	});
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
