<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $users = User::all()->except(['id' => 1]);

        return view('admin.users.index', compact('users'));
    }

    public function profile()
    {   
        
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
        $user = User::findOrFail($id);
        
        return view('admin.user.edit', compact('user'));
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
        
        if ($file = $request->file('photo_id')) {
          $name = time().$file->getClientOriginalName();
          $file->move('storage/', $name);
          $photo = Photo::create(['file'=>$name]);
          $input['photo_id'] = $photo->id;

        }
        $user->update($input);
        Session::flash('success', 'Your profile has been updated');
        return redirect('/admin/profile');
    }

  

    public function updateActive($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->is_active == 0) {
            $user->update(['is_active' => 1]);
        }elseif($user->is_active == 1){
            $user->update(['is_active' => 0]);
        }
        
        Session::flash('success', 'User has been updated');
        return redirect('/admin/users');
    }

    public function updateAdmin($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->role_id == 1) {
            $user->update(['role_id' => 2]);
        }elseif($user->role_id == 2){
            $user->update(['role_id' => 1]);
        }
        
        Session::flash('success', 'User has been updated');
        return redirect('/admin/users');
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
