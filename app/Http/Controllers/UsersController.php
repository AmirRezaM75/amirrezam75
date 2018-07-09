<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function show()
    {
        $user = Auth::user();
        return view('panel.user.profile.edit',compact('user'));

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


    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'name' => array(
                'required',
                'min:4',
                'max:255',
                'regex:/^[پچجحخهعغفقثصضشسیبلاتنمکگوئدذرزطظژؤإۀآأءًٌٍَُِّ\s\n\r\t\(\)\[\]\{\}\؛]+$/',
            ),
            'email' => 'required|max:255|unique:users,email,'.$user->id,
            'username' => array(
                'required',
                'min:6',
                'max:255',
                'regex:/^[A-Za-z][a-zA-Z0-9]*$/',
                'unique:users,username,'.$user->id,
            )
        ]);


        $user->update($request->all());
        return redirect('/user/profile/edit');

    }
}
