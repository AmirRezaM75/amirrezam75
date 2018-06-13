<?php

namespace App\Http\Controllers;

use App\Category;
use App\Like;
use App\Photo;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('panel.admin.layouts.post.post_manage',compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('panel.admin.layouts.post.post_add',compact('categories'));
    }

    public function store(Request $request)
    {
        if (Auth::check()){
            $input = $request->all();
            $input['user_id'] = Auth::user()->id;
            if ($file = $request->file('photo_id')) {
                $name = "post"."_".time()."_".$file->getClientOriginalName();
                $file->move('upload/post',$name);
                $photo = Photo::create(['path'=>$name]);
                $input['photo_id'] = $photo->id;
            }

            $newpost = Post::create($input);
            //PUT ALL YOUR TAGS INSIDE A MULTI DIMENSIONAL ARRAY
            $temp = array();
            $tags = Tag::all();
            foreach ($tags as $tag){
                array_push($temp,$tag->name);
            }

            $postId = $newpost->id;
            $post = Post::findOrFail($postId);
            if (!empty($request->tags)){
                $requestedTagString = $request->tags;
                $requestedTags = explode('-',$requestedTagString);
                foreach ($requestedTags as $requestedTag){
                    if(in_array($requestedTag, $temp)){
                        $tag = Tag::where('name',$requestedTag)->first();
                        $tagId = $tag->id;
                        $post->tags()->attach($tagId);
                    }else{
                        $tag = Tag::create(['name'=>$requestedTag]);
                        $post->tags()->attach($tag->id);
                    }
                }
            }
            return redirect('admin/posts');
        } else {
            return redirect('/login');
        }
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments()->whereCommentId(0)->get();
        $commentsCount = count($post->comments);
        $recentPosts = Post::orderBy('created_at','desc')->take(5)->get();
        $categories = Category::all();
        return view('main.layouts.article',compact('post','comments','commentsCount','recentPosts','categories'));
    }


    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);
        return view('panel.admin.layouts.post.post_edit',compact('post','categories'));
    }

    public function update(Request $request, $id)
    {
        //PUT ALL YOUR TAGS INSIDE A MULTI DIMENSIONAL ARRAY
        $temp = array();
        $tags = Tag::all();
        foreach ($tags as $tag){
            array_push($temp,$tag->name);
        }

        $post = Post::findOrFail($id);
        if (!empty($request->tags)){
            $requestedTagString = $request->tags;
            $requestedTags = explode('-',$requestedTagString);
            foreach ($requestedTags as $requestedTag){
                if(in_array($requestedTag, $temp)){
                    $tag = Tag::where('name',$requestedTag)->first();
                    $tagId = $tag->id;
                    if (empty($post->tags()->where('tag_id',$tagId)->first())){
                        $post->tags()->attach($tagId);
                    }
                }else{
                    $tag = Tag::create(['name'=>$requestedTag]);
                    $post->tags()->attach($tag->id);
                }
            }
        }

        $input = $request->all();
        if ($file = $request->file('photo_id')) {
            $name = "post".$post->id."_".time()."_".$file->getClientOriginalName();
            if ($post->photo_id != 0){
                $oldPath =public_path().'/upload/post/'.$post->photo->path;
                $oldPhoto = Photo::findOrFail($post->photo_id);
                unlink($oldPath);
                $file->move('upload/post',$name);
                $oldPhoto->update(['path'=>$name]);
                $input['photo_id'] = $oldPhoto->id;
            } else {
                $file->move('upload/post',$name);
                $photo = Photo::create(['path'=>$name]);
                $input['photo_id'] = $photo->id;
            }
        }


        $post->update($input);
        return redirect('admin/posts');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $photo = $post->photo;
        $path = public_path().'/upload/post/'.$photo->path;
        $photo->delete();
        unlink($path);
        $post->delete();
        Session::flash('deleted_post','The Post has been deleted successfully');
        return redirect('/admin/posts');
    }

    public function likePost(Request $request){

        $postId = (int) $request->post_id;
        $post = Post::findorFail($postId);
        $postLikes = (int) $post->likes;
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
        $like = $user->likes()->where('post_id',$postId)->first();
        if ($like){
            $like -> delete();
            $postLikes = $postLikes - 1;
            $post->update(['likes'=>$postLikes]);
            $output['postLikes'] = $post -> likes;
            $output['operation'] = 'dislike';
            echo json_encode($output);
        } else {
            Like::create(['user_id'=>$userId,'post_id'=>$postId]);
            $postLikes = $postLikes + 1;
            $post->update(['likes'=>$postLikes]);
            $output['postLikes'] = $post -> likes;
            $output['operation'] = 'like';
            echo json_encode($output);
        }
    } //AJAX LIKE POST
}
