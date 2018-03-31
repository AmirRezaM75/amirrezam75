<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Reply;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('panel.admin.layouts.comment.comment_edit',compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['text'=>$request->text]);
        return redirect('/admin/comments/manage');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        Session::flash('deleted_comment','The Comment has been deleted successfully');
        return redirect('/admin/comments/manage');

    }

    public function createComment(Request $request)
    {
        if (Auth::check()){
            if (!$request->comment_id){
                Comment::create($request->all());
                return redirect('/post/'.$request->post_id.'#comments');
            } else {
                Comment::create($request->all());
                return redirect('/post/'.$request->post_id.'#comments');
            }

        } else {
            redirect('/login');
        }

    }

    public function manage()
    {
        $comments = Comment::all();
        return view('panel.admin.layouts.comment.comment_manage',compact('comments'));
    }
}
