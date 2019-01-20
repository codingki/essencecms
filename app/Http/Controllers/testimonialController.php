<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use App\Photo;
use Illuminate\Support\Facades\Session;
use App\Slim;

class testimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimoni = Testimonial::all();
        return view('admin.testimonials.index', compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
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
        
        $images = Slim::getImages();
        if (!empty($images)) {
            $image = $images[0];
            
            $input['photo_id'] = Photo::upload($image);
        }
        Testimonial::create($input);
        Session::flash('success', 'Your Testimonial has been created');
        
        return redirect('/admin/testimonials');
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
        $testimoni = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimoni'));
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
        $input = $request->all();
        $testi = Testimonial::findOrFail($id);

        $images = Slim::getImages();
        if (!empty($images)) {
            $image = $images[0];
            Photo::remove($testi->photo->file, $testi->photo_id);
            $input['photo_id'] = Photo::upload($image);
        }
        
        $testi->update($input);
        Session::flash('success', 'Your Testimonial has been updated');
        return redirect('/admin/testimonials');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimonial::findOrFail($id)->delete();
        Session::flash('success', 'Your Testimonial has been deleted');
        return redirect('/admin/testimonials');
    }
}
