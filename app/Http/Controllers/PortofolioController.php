<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slim;
use App\Photo;
use App\Portofolio;
use Illuminate\Support\Facades\Session;


class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portofolio = Portofolio::all();
        return view('admin.portofolio.index', compact('portofolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portofolio.create');
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
        
        $logos = Slim::getLogo();
        if (!empty($logos)) {
            $logo = $logos[0];
            $input['photo_id'] = Photo::upload($logo);
        }
        $thumbnails = Slim::getThumbnail();
        if (!empty($thumbnails)) {
            $thumbnail = $thumbnails[0];
            $input['thumbnail'] = Photo::upload($thumbnail);
        }

        $images = Slim::getImages();
        if (!empty($images)) {
            $image = $images;
            $input['photos'] = serialize(Photo::uploadAll($image));
        }
        
        
        Portofolio::create($input);
        Session::flash('success', 'Portofolio has been created');
        return redirect('/admin/portofolio');
    
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
        $porto = Portofolio::findOrFail($id);
        return view('admin.portofolio.edit', compact('porto'));
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
        $porto = Portofolio::findOrFail($id);

        $logos = Slim::getLogo();
        if (!empty($logos)) {
            $logo = $logos[0];
            Photo::remove($porto->photo->file, $porto->photo_id);
            $input['photo_id'] = Photo::upload($logo);
        }
        $thumbnails = Slim::getThumbnail();
        if (!empty($thumbnails)) {
            $thumbnail = $thumbnails[0];
            Photo::remove($porto->thumbnail_image->file, $porto->thumbnail);
            $input['thumbnail'] = Photo::upload($thumbnail);
        }

        $images = Slim::getImages();
        if (!empty($images)) {
            $image = $images;
            Photo::removeAll(unserialize($porto->photos));
            $input['photos'] = serialize(Photo::uploadAll($image));
        }
        
        $porto->update($input);
        Session::flash('success', 'Portofolio has been updated');
        return redirect('/admin/portofolio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $porto = Portofolio::findOrFail($id);
        Photo::remove($porto->photo->file, $porto->photo_id);
        Photo::remove($porto->thumbnail_image->file, $porto->thumbnail);
        Photo::removeAll(unserialize($porto->photos));
        $porto->delete();
        Session::flash('success', 'Portofolio has been deleted');
        return redirect('/admin/portofolio');
    }

    
}
