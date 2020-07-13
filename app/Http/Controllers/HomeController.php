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
        ///////////////////////INSTAGRAM FEED/////////////////////
        $token = env('INSTAGRAM_ACCESS_TOKEN');
        $count = 12;
        $feeds = [];
//        $url = "https://api.instagram.com/v1/users/self/media/recent/?access_token={$token}&count={$count}";
        $url = public_path('instagram.json');
        $response = json_decode(file_get_contents($url));
        foreach ($response->graphql->user->edge_owner_to_timeline_media->edges as $edge) {
            if ($edge->node->is_video) continue;
            array_push($feeds, [
                'link' => 'https://www.instagram.com/p/' . $edge->node->shortcode,
                'likes_count' => $edge->node->edge_liked_by->count,
                'comments_count' => $edge->node->edge_media_to_comment->count,
                'thumbnail_src' => $edge->node->thumbnail_src
            ]);
        }
        // In case access_token is expired
        /*try {
            $response = json_decode(file_get_contents($url));
            $feeds = array_slice($response->data, 0, 8);
        } catch (\Exception $exception) {
            $feeds = [];
        }*/


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
