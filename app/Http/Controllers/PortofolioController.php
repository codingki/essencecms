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

        $images = Slim::getImages();
        if (!empty($images)) {
            $image = $images;
            $input['photos'] = Photo::uploadAll($image);
        }
        return $input;
        // Portofolio::create($input);
        // Session::flash('success', 'Your Portofolio has been created');
        // return redirect('/admin/portofolio');
    
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
