<?php
use App\Portofolio;
use App\Post;
use App\Categories;
use App\Testimonial;
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
// Public view

// Home
Route::get('/', 
	['as' => 'home', 'uses' => 'PublicViewController@home']
);

// Services
Route::get('services', 
	['as' => 'services', 'uses' => 'PublicViewController@services']
);

// Portofolio
Route::get('portofolio', 
	['as' => 'portofolio', 'uses' => 'PublicViewController@portofolio']
);

Route::get('portofolio/{slug}', 
	['as' => 'portofolio.single', 'uses' => 'PublicViewController@portofolio_single']
);

// About us
Route::get('about', 
	['as' => 'about', 'uses' => 'PublicViewController@about']
);

// Contact
Route::get('contact', 
	['as' => 'contact', 'uses' => 'PublicViewController@contact']
);

// Blog
Route::get('blog', 
	['as' => 'blog', 'uses' => 'PublicViewController@blog']
);

Route::get('blog/{slug}', 
	['as' => 'blog.single', 'uses' => 'PublicViewController@blog_single']
);

Route::get('blog/category/{slug}', 
	['as' => 'blog.category', 'uses' => 'PublicViewController@blog_category']
);

Route::get('blog/tags/{tag}', 
	['as' => 'blog.tags', 'uses' => 'PublicViewController@blog_tag']
);

// Admin Routes
Route::group(['middleware' => 'auth'], function(){
	Route::resource('admin/profile', 'ProfileController');
		Route::group(['middleware'=> 'active'], function(){
			Route::get('admin', function () {
		    return view('admin.index');
			});
			Route::get('admin/categories/edit/{id}', ['as' => 'admin.categories.edit', 'uses' => 'CategoryController@edit']);
			Route::get('admin/posts/edit/{id}', ['as' => 'admin.posts.edit', 'uses' => 'PostsController@edit']);
			Route::get('admin/testimonials/edit/{id}', ['as' => 'admin.testimonials.edit', 'uses' => 'testimonialController@edit']);
			Route::get('admin/portofolio/edit/{id}', ['as' => 'admin.portofolio.edit', 'uses' => 'PortofolioController@edit']);
			Route::resource('admin/categories', 'CategoryController');
			Route::resource('admin/testimonials', 'testimonialController');
			Route::resource('admin/portofolio', 'PortofolioController');
			Route::resource('admin/posts', 'PostsController');
			Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    		Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
			
			Route::group(['middleware'=> 'admin'], function(){
				Route::resource('admin/users', 'UsersController');
				Route::get('admin/users/updateActive/{id}', ['as' => 'admin.users.updateActive', 'uses' => 'UsersController@updateActive']);
				Route::get('admin/users/updateAdmin/{id}', ['as' => 'admin.users.updateAdmin', 'uses' => 'UsersController@updateAdmin']);
			});
	});
});



Auth::routes();


