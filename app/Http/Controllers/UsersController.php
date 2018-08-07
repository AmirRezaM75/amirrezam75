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

    //Admins Update User's Status and Role
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $input['status'] = $request->status;
        $input['role_id'] = $request->role_id;
        $user->update($input);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/users');
    }


    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $input['name'] = $request->name;
        $input['username'] = $request->username;
        $input['email'] = $request->email;
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

        if (!empty($request->password)){
            if (password_verify($request->password, $user->password)){
                if ($request->new_password == $request->password_confirmation) {
                    $input['password'] = bcrypt($request->new_password);
                } else {
                    flash('رمز عبور جدید با هم تطابق ندارد', 'danger');
                    return redirect('/profile/edit');
                }
            } else {
                flash('رمز عبور کنونی شما اشتباه است', 'danger');
                return redirect('/profile/edit');
            }
        }

        $user->update($input);
        flash('پروفایل شما با موفقیت آپدیت شد', 'success');
        return redirect('/profile/edit');
    }



    public function updatePicture(Request $request)
    {
        $user = User::findOrFail($request->userId);
        if ($file = $request->file('croppedImage')) {
            $name = "profile_".time()."_".$file->getClientOriginalName().'.png';
            if ($user->photo_id > 0) {
                $oldPath = public_path().'/upload/profile/'.$user->photo->path;
                $oldPhoto = Photo::findOrFail($user->photo_id);
                unlink($oldPath);
                $file->move('upload/profile',$name);
                $oldPhoto->update(['path'=>$name]);
                $input['photo_id'] = $oldPhoto->id;
                return $name;
            } else {
                $file->move('upload/profile',$name);
                $photo = Photo::create(['path'=>$name]);
                $input['photo_id'] = $photo->id;
                $user->update(["photo_id"=>$photo->id]);
                return $name;
            }
        }
    }
}
