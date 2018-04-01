<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function update(Request $request)
    {
        $about = About::first();
        $about->update($request->all());
        Session::flash('update_message','The information have updated successfully');
        return redirect('/admin/about/edit');
    }

    public function edit()
    {
        $about = About::first();
        return view('panel.admin.layouts.about-me.about_edit',compact('about'));
    }
}
