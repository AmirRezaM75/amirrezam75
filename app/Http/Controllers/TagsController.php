<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'asc')->get();
        return view('panel.admin.layouts.tag.tag_manage',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('panel.admin.layouts.tag.tag_add',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tag::create($request->all());
        return redirect('admin/tags');
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
        $tag = Tag::findOrFail($id);
        return view('panel.admin.layouts.tag.tag_edit',compact('tag'));
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
        $tag = Tag::findOrFail($id);
        $tag->update($request->all());
        return redirect('/admin/tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        $tag->posts()->detach();
        Session::flash('deleted_tag','The tag has been deleted successfully');
        return redirect('/admin/tags');
    }

    public function findTag(Request $request){
        $tagString = $request->tagString;
        $tags = Tag::where('name','like', '%' . $tagString . '%')->get();
        if ($tags){
            foreach ($tags as $tag){
                echo "<div class='btn btn-primary tagButton'>
                            <span class='tagValue'>".$tag->name."</span>
                      </div>";//end of echo
            }//endforeach
        }//endif
    }

    public function deleteTag(Request $request){
        $tagId = $request->tagId;
        $postId = $request->postId;
        $post = Post::findOrFail($postId);
        $post->tags()->detach($tagId);
        foreach ($post->tags as $tag):
            echo "<div class='btn btn-danger tagged' data-postid='".$post->id."' data-tagid='".$tag->id."'>".$tag->name."</div>";
        endforeach;
    }
}
