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

	    $members = Member::all();
	    $skills  = Skill::all();
	    $about = About::first();
	    $posts = Post::orderBy('created_at','desc')->take(3)->get();
        ///////////////////////INSTAGRAM FEED////////////////////

        $feeds = [];
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
