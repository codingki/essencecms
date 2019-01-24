<?php
use App\Portofolio;
use App\Post;
use App\Categories;
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

Route::get('services', function () {
    return view('public.services');
});


Route::get('contact', function () {
    return view('public.contact');
});



Route::get('portofolio', function () {
	$portofolio = Portofolio::all();
    return view('public.portofolio.index', compact('portofolio'));
});
Route::get('portofolio/{slug}', 
	['as' => 'portofolio.single', 'uses' => 'PortofolioController@post']
);

Route::get('blog', function () {
	$blogs = Post::paginate(6);
	$categories = Categories::all();
	$recent = Post::all()->sortByDesc("created_at")->take(10);
    return view('public.blog.index', compact('blogs', 'categories', 'recent'));
});

Route::get('blog/{slug}', 
	['as' => 'blog.single', 'uses' => 'PostsController@single']
);

Route::get('blog/category/{slug}', 
	['as' => 'blog.category', 'uses' => 'PostsController@cat']
);

Route::get('blog/tags/{tag}', 
	['as' => 'blog.tags', 'uses' => 'PostsController@tag']
);


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

Route::get('home', 'HomeController@index')->name('home');
