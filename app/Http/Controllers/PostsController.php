<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categories;
use App\Photo;
use App\Slim;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        $images = Slim::getImages();
        if (!empty($images)) {
            $image = $images[0];
            $input['photo_id'] = Photo::upload($image);
        }
        $user->posts()->create($input);
        Session::flash('success', 'Your Post has been created');
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Categories::pluck('name', 'id')->all();
        return view('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        
        $input = $request->except('user_id');
        $post = Post::findOrFail($id);
        $images = Slim::getImages();
        if (!empty($images)) {
            $image = $images[0];
            Photo::remove($post->photo->file, $post->photo_id);
            $input['photo_id'] = Photo::upload($image);
        }
        Auth::user()->posts()->whereId($id)->first()->update($input);
        Session::flash('success', 'Your Post has been updated');
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        Photo::remove($post->photo->file, $post->photo_id);
        $post->delete();
        Session::flash('success', 'Your Post has been deleted');
        return redirect('/admin/posts');
    }

    public function single($slug){
        $categories = Categories::all();
        $recent = Post::all()->sortByDesc("created_at")->take(10);
        $blog = Post::where('slug', $slug)->first();
        $cat = Categories::where('id', $blog->category_id)->first();
        views($blog)->record();
        views($cat)->record();
        if ($blog) {
            return view('public.blog.single', compact('blog', 'categories', 'recent'));
        }else{
            
            abort(404);
        }
        
    }
    public function cat($slug){
        $cat = Categories::where('slug', $slug)->first();
        $categories = Categories::all();
        $recent = Post::all()->sortByDesc("created_at")->take(10);
        
        if ($cat) {
            $a = Post::where('category_id', $cat->id);
            $blogs = Post::where('category_id', $cat->id)->orderBy('created_at', 'desc')->paginate(6);
            return view('public.blog.category', compact('blogs', 'cat', 'categories', 'recent'));
        }else{
            
            abort(404);
        }
        
    }

    public function tag($tag){
        $tags = $tag;
        $tag = Post::where('slug', 'like', '%'.$tag.'%');
        $categories = Categories::all();
        $recent = Post::all()->sortByDesc("created_at")->take(10);
        
        if ($tag) {
            
            $blogs = $tag->orderBy('created_at', 'desc')->paginate(6);
            return view('public.blog.tags', compact('blogs', 'tags', 'categories', 'recent'));
        }else{
            
            abort(404);
        }
        
    }

}
