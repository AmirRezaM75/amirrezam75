<?php

namespace App\Http\Controllers;

use App\Member;
use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('id', 'asc')->get();
        return view('panel.admin.layouts.member.member_manage',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.admin.layouts.member.member_add');
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
        if ($file = $request->file('photo')) {
            $name = "memberPicture_".time()."_".$file->getClientOriginalName();
            $file->move('upload/member',$name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        Member::create($input);
        return redirect('admin/members');
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
        $member = Member::findOrFail($id);
        return view('panel.admin.layouts.member.member_edit',compact('member'));
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
        $member = Member::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = "memberPicture_".time()."_".$file->getClientOriginalName();
            if ($member->photo_id != 0){
                $oldPath =public_path().'/upload/member/'.$member->photo->path;
                $oldPhoto = Photo::findOrFail($member->photo_id);
                unlink($oldPath);
                $file->move('upload/member',$name);
                $oldPhoto->update(['path'=>$name]);
                $input['photo_id'] = $oldPhoto->id;
            } else {
                $file->move('upload/member',$name);
                $photo = Photo::create(['path'=>$name]);
                $input['photo_id'] = $photo->id;
            }
        }
        $member->update($input);
        Session::flash('update_message','The member has been edited successfully');
        return redirect('/admin/members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        Session::flash('delete_message','The member has been deleted successfully');
        return redirect('/admin/members');
    }
}
