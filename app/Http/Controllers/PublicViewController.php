<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categories;
use App\Photo;
use App\Testimonial;
use App\Portofolio;

class PublicViewController extends Controller
{
    // Home 
    public function home(){
    	$portofolio = Portofolio::all()->sortByDesc("created_at")->take(3);
		$testimonial = Testimonial::all()->sortByDesc("created_at")->take(3);
		$blogs = Post::all()->sortByDesc("created_at")->take(3);
		return view('public.index', compact('portofolio', 'testimonial', 'blogs'));
    }

    // Services
    public function services(){
    	return view('public.services');
    }

    // Portofolio
    public function portofolio(){
    	$portofolio = Portofolio::all();
    	return view('public.portofolio.index', compact('portofolio'));
    }

    public function portofolio_single($slug){
    	$porto = Portofolio::where('slug', $slug)->first();
        views($porto)->record();
        if ($porto) {
            return view('public.portofolio.single', compact('porto'));
        }else{
            
            abort(404);
        }
    }
    // About 
    public function about(){
    	return view('public.about');
    }

    // Contact 
    public function contact(){
    	return view('public.contact');
    }

    // Blog
    public function blog(){
    	$blogs = Post::paginate(6);
		$categories = Categories::all();
		$recent = Post::all()->sortByDesc("created_at")->take(10);
        $top = Post::orderByViews('desc')->get()->take(5);
	    return view('public.blog.index', compact('blogs', 'categories', 'recent', 'top'));
    }

    public function blog_category($slug){
    	$cat = Categories::where('slug', $slug)->first();
        $categories = Categories::all();
        $recent = Post::all()->sortByDesc("created_at")->take(10);
        $top = Post::orderByViews('desc')->get()->take(5);
        if ($cat) {
            $a = Post::where('category_id', $cat->id);
            $blogs = Post::where('category_id', $cat->id)->orderBy('created_at', 'desc')->paginate(6);
            return view('public.blog.category', compact('blogs', 'cat', 'categories', 'recent', 'top'));
        }else{
            
            abort(404);
        }
    }

    public function blog_single($slug){
    	$categories = Categories::all();
        $recent = Post::all()->sortByDesc("created_at")->take(10);
        $blog = Post::where('slug', $slug)->first();
        $cat = Categories::where('id', $blog->category_id)->first();
        $top = Post::orderByViews('desc')->get()->take(5);
        views($blog)->record();
        views($cat)->record();
        if ($blog) {
            return view('public.blog.single', compact('blog', 'categories', 'recent', 'top'));
        }else{
            
            abort(404);
        }
    }

    public function blog_tag($tag){
    	$tags = $tag;
        $tag = Post::where('slug', 'like', '%'.$tag.'%');
        $categories = Categories::all();
        $recent = Post::all()->sortByDesc("created_at")->take(10);
        $top = Post::orderByViews('desc')->get()->take(5);
        if ($tag) {
            
            $blogs = $tag->orderBy('created_at', 'desc')->paginate(6);
            return view('public.blog.tags', compact('blogs', 'tags', 'categories', 'recent', 'top'));
        }else{
            
            abort(404);
        }
    }


}
