<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class SkillsController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('id', 'asc')->get();
        return view('panel.admin.layouts.skill.skill_manage',compact('skills'));
    }

    public function create()
    {
        return view('panel.admin.layouts.skill.skill_add');
    }

    public function store(Request $request)
    {
        Skill::create($request->all());
        return redirect('/admin/skills');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('panel.admin.layouts.skill.skill_edit',compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->update($request->all());
        return redirect('/admin/skills');
    }

    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        Session::flash('delete_message','The skill has been deleted successfully');
        return redirect('/admin/skills');
    }
}
