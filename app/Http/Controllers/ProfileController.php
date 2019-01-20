<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Slim;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =  Auth::user();
       
        $profile = User::findOrFail($user->id);
        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);

        if (trim($request->password) == '') {
          $input = $request->except('password');
        }else{
          $input = $request->all();
          $input['password'] = bcrypt($request->password);
        }
        $images = Slim::getImages();
        if (!empty($images)) {
            $image = $images[0];
            if ($user->photo_id) {
                Photo::remove($user->photo->file, $user->photo_id);
            }
            
            $input['photo_id'] = Photo::upload($image);
        }
        $user->update($input);
        Session::flash('success', 'Your profile has been updated');
        return redirect('/admin/profile');
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
