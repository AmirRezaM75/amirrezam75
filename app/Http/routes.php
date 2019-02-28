<?php

use App\Post;
use App\Skill;
use App\About;
use App\Category;
use App\Member;

Route::get('/403', function () {
    return view('errors.403');
});
Route::get('/404', function () {
    return view('errors.404');
});

Route::post('/post','CommentsController@createComment');

///////////////////////HOME/////////////////////
Route::get('/',function (){
    $members = Member::all();
    $skills = Skill::all();
    $about = About::first();
    $posts = Post::orderBy('created_at','desc')->take(3)->get();
    return view('main.layouts.index',compact('posts','skills','about','members'));
});


///////////////////////BLOG/////////////////////
Route::get('/blog',function (){
    $posts = Post::orderBy('created_at','desc')->get();
    $categories = Category::all();
    return view('main.layouts.blog',compact('posts','categories'));
});

Route::get('blog/post/{post}',['as'=>'posts.show', 'uses'=>'PostsController@show']);

Route::get('/blog/category/{id}',function ($id){
    $posts = Post::whereCategoryId($id)->orderBy('created_at','desc')->get();
    $selectedCategory = Category::where('id',$id)->first();
    $categories = Category::all();
    return view('main.layouts.blog',compact('posts','categories','selectedCategory'));
});

Route::get('/blog/tag/{id}',function ($id){
    $posts = Post::whereHas('tags', function($q) use ($id){
        $q->where('tag_id', $id);
    })->get();
    $categories = Category::all();
    return view('main.layouts.blog',compact('posts','categories'));
});




Route::auth();

Route::get('/profile/edit','UsersController@show');
Route::patch('/profile/edit','UsersController@updateProfile');

///////////////////////ADMIN/////////////////////
Route::group(['middleware'=>'role'],function(){
    Route::get('/admin', function () {
        return view('panel.admin.dashboard');
    });

    Route::get('admin/about/edit',['as'=>'admin.about.edit', 'uses'=>'AboutController@edit']);
    Route::post('admin/about/edit',['as'=>'admin.about.update', 'uses'=>'AboutController@update']);

    //RESOURCES
    Route::resource('admin/users','UsersController');
    Route::resource('admin/posts','PostsController');
    Route::resource('admin/categories','CategoriesController');
    Route::resource('admin/tags','TagsController');
    Route::resource('admin/skills','SkillsController');
    Route::resource('admin/members','MembersController');
    Route::resource('admin/comments','CommentsController');
    Route::resource('admin/contact','ContactController');


});



//AJAX REQUEST ROUTES
Route::post('/like',[
    'as'=>'like',
    'uses'=>'PostsController@likePost'
]);

Route::post('/ajax/tags',[
    'as'=>'ajax.tags',
    'uses'=>'TagsController@findTag'
]);

Route::post('/ajax/tags/delete',[
    'as'=>'ajax.tags.delete',
    'uses'=>'TagsController@deleteTag'
]);

Route::post('/ajax/user/picture/edit',[
    'as'=>'updatePictureProfile',
    'uses'=>'UsersController@updatePicture'
]);


Route::post('/ajax/contact',[
	'as'=>'ajax.contact',
	'uses'=>'ContactController@createMessage'
]);

