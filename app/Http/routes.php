<?php
use App\Post;
use App\Skill;
use App\About;
use App\Category;


Route::get('/admin/contact/manage',['as'=>'contact.manage', 'uses'=>'ContactController@manage']);
Route::resource('/admin/contact','ContactController');
Route::post('/','ContactController@createMessage');
Route::get('/',function (){
    $skills = Skill::all();
    $about = About::first();
    $posts = Post::orderBy('created_at','desc')->take(3)->get();
    return view('main.layouts.index',compact('posts','skills','about'));
});

Route::get('/blog',function (){
    $posts = Post::orderBy('created_at','desc')->get();
    $categories = Category::all();
    return view('main.layouts.blog',compact('posts','categories'));
});



Route::get('/admin/comments/manage',['as'=>'comments.manage', 'uses'=>'CommentsController@manage']);

Route::resource('admin/comments','CommentsController');



Route::get('/403', function () {
    return view('errors.403');
});
Route::get('/404', function () {
    return view('errors.404');
});



Route::post('/post','CommentsController@createComment');
Route::get('blog/post/{id}',['as'=>'posts.show', 'uses'=>'PostsController@show']);
Route::post('/ajax/reply','CommentsController@createReply');
Route::auth();

Route::get('/home', 'HomeController@index');

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

Route::post('/ajax/post/uploadImage',[
    'as'=>'ajax.post.uploadImage',
    'uses'=>'PostsController@uploadImage'
]);

