<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('panel.admin.layouts.user.user_manage',compact('users'));
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
        $roles = Role::all();

        $user = User::findOrFail($id);
        return view('panel.admin.layouts.user.user_edit',compact('user','roles'));
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
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = "pictureProfile_".time()."_".$file->getClientOriginalName();
            if ($user->photo_id > 0){
                $oldPath =public_path().'/upload/profile/'.$user->photo->path;
                $oldPhoto = Photo::findOrFail($user->photo_id);
                unlink($oldPath);
                $file->move('upload/profile',$name);
                $oldPhoto->update(['path'=>$name]);
                $input['photo_id'] = $oldPhoto->id;
            } else {
                $file->move('upload/profile',$name);
                $photo = Photo::create(['path'=>$name]);
                $input['photo_id'] = $photo->id;
            }
        }
        $user->update($input);
        return redirect('admin/users');
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
