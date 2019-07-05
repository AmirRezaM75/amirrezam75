<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

	public function search()
	{
		$posts = Post::where('title', 'like', '%'.request('query').'%')->get();
		return view('main.layouts.blog',compact('posts'));
	}
}
