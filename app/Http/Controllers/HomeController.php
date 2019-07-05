<?php

namespace App\Http\Controllers;

use App\Post;
use App\Skill;
use App\About;
use App\Member;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    ///////////////////////INSTAGRAM FEED/////////////////////
	    $token = env('INSTAGRAM_ACCESS_TOKEN');
	    $count = 8;
	    $url = "https://api.instagram.com/v1/users/self/media/recent/?access_token={$token}&count={$count}";
	    $response = json_decode(file_get_contents($url));

	    $members = Member::all();
	    $skills  = Skill::all();
	    $about = About::first();
	    $posts = Post::orderBy('created_at','desc')->take(3)->get();
	    $feeds = $response->data;
	    return view('main.layouts.index',compact('posts','skills','about','members', 'feeds'));
    }

	public function search()
	{
		$query = request('query');
		$posts = Post::where('title', 'like', '%'.$query.'%')
		             ->orWhere('description', 'like', '%'.$query.'%')
		             ->orWhere('text', 'like', '%'.$query.'%')
		             ->get();
		return view('main.layouts.blog',compact('posts'));
	}
}
