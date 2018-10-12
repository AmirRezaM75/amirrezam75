<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$post->title}}</title>
    <meta name="description" content="{{$post->description}}">
    <meta property="og:locale" content="fa_IR">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{$post->title}}">
    <meta property="og:description" content="{{$post->description}}">
    <meta property="og:site_name" content="amirrezam75">
    <meta property=og:url content="{{Request::url()}}">
    <meta property="article:published_time" content="{{$post->created_at}}">
    <meta property="article:modified_time" content="{{$post->updated_at}}">
    <meta property="og:image" content="{{$post->photo ? asset('upload/post/'.$post->photo->path) : asset('images/single-blog.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" >

    <!-- Stylesheets-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('libs/materialize/css/materialize.min.css')}}" media="screen,projection" />
    <link rel="stylesheet" href="{{asset('css/article.css')}}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
</head>

<body>



<!-- Preloader -->
<div id="preloader">
    <div class="loader">
        <svg class="circle-loader" height="50" width="50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="6" stroke-miterlimit="10" />
        </svg>
    </div>
</div><!--preloader end-->

<div id="app">
    <!-- header navigation start -->
    @include('partials.header')
    <!-- #header  navigation end -->

    <!-- Banner start -->
    <section id="banner" class="root-sec brand-bg padd-tb-55 single-banner blogpage-banner-wrap">
        <div class="container">
            <div class="row">
                <div class="clearfix blog-banner-text blog-single-banner">
                    <div class="col-md-12">
                        <h2 class="title RTL_direction text-right">{{$post->title}}</h2>
                        <ul class="clearfix blog-post-meta pull-right">
                            <li>By <a href="#" class="EnFont">{{$post->user->username}}</a></li>
                            <li>{{$post->created_at}}</li>
                            <li><a href="#comments" data-section="#comments" class="menu-smooth-scroll EnFont">{{$commentsCount}} Comments</a></li>
                            <li><a href="{{url('/blog/category',$post->category->id)}}">{{$post->category->name}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- ./Banner end -->

    <!-- Blog Post Container-->
    <section id="all-posts" class="root-sec grey lighten-5 blogpage-posts-wrap">
        <div class="container">
            <div class="row">
                <div class="clearfix all-blog-post blog-inner with-sidebar">
                    <!-- Sidebar start-->
                    <div class="col-sm-8">
                        <article class="single-post-page">
                            <div class="thumb-wrap">
                                <img src="{{$post->photo ? asset('upload/post/'.$post->photo->path) : asset('images/single-blog.png')}}" alt="">
                            </div>
                            <div class="single-post-content">
                                {!! $post->text !!}
                            </div>
                            <div class="clearfix post-footer">

                                @if(Auth::check())
                                    <a href="#" class="left post-like js-favorite EnFont {{Auth::user()->likes()->where('post_id',$post->id)->first() ? 'active' : ''}}" title="{{Auth::user()->likes()->where('post_id',$post->id)->first() ? 'شما قبلا این پست را لایک کرده اید' : 'لایک'}}" data-postid="{{$post->id}}"><i class="mdi-action-favorite"></i> <span class="numb">{{$post->likes}}</span></a>
                                @else
                                    <a href="#" class="left post-like EnFont " title="برای لایک کردن باید وارد شوید"><i class="mdi-action-favorite"></i> <span class="numb">{{$post->likes}}</span></a>
                                @endif
                                <ul class="clearfix right share-post">
                                    <li><a href="https://telegram.me/share/url?url={{Request::url()}}"><i class="fa fa-telegram"></i> <span>تلگرام</span></a></li>
                                </ul>
                            </div>

                            <div class="comment-reply-section" id="comments">
                                <h2 class="com-title text-right">تا کنون {{$commentsCount}} نظر به ثبت رسیده است</h2>
                                <div class="comment-list-wrapper">
                                    <ul class="comment-list">
                                        @foreach($comments as $comment)
                                            <li>
                                                <div class="clearfix card">
                                                    <div class="left comment-img">
                                                        <a href="#"><img src="{{empty($comment->user->photo->path)  ? asset('images/unknown.jpg') : asset('upload/profile/'.$comment->user->photo->path)}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="card-content comment-content">
                                                        <div class="comment-meta">
                                                            <p class="author"><a href="#">{{$comment->user->name}}</a>
                                                            </p>
                                                            <p class="date">{{$comment->created_at->diffForHumans()}}</p>
                                                            <a href="#/" class="tooltips tooltipped reply-btn" data-position="top" data-delay="50" data-tooltip="{{Auth::check() ? 'Reply' : 'برای ثبت نظر باید وارد حساب کاربری خود شوید'}}" data-commentid="{{$comment->id}}" data-userid="{{Auth::check() ? Auth::user()->id : ''}}" data-postid="{{$comment->post->id}}" ><i class="mdi-content-reply"></i></a>
                                                        </div>
                                                        <div class="comment-text RTL_direction mainFonts text-right">
                                                            <p>{{$comment->text}}</p>
                                                        </div>
                                                        <div class="reply-form-container">

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @if($comment->replies)
                                                <ul class="comment-list">
                                                    @foreach($comment->replies as $reply)
                                                        <li>
                                                            <div class="clearfix card">
                                                                <div class="left comment-img">
                                                                    <a href="#"><img src="{{empty($reply->user->photo->path)  ? asset('images/unknown.jpg') : asset('upload/profile/'.$reply->user->photo->path)}}" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="card-content comment-content">
                                                                    <div class="comment-meta">
                                                                        <p class="author"><a href="#">{{$reply->user->name}}</a>
                                                                        </p>
                                                                        <p class="date">{{$reply->created_at->diffForHumans()}}</p>
                                                                    </div>
                                                                    <div class="comment-text RTL_direction mainFonts text-right">
                                                                        <p>{{$reply->text}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>{{--End of Comment--}}
                                            @endif
                                        @endforeach
                                    </ul>{{--End of Comment--}}
                                </div>
                            </div>

                            @if(Auth::check())
                                <div class="contact-form  comment-reply-form">
                                    {!! Form::open(['method'=>'POST', 'action'=>'CommentsController@createComment','class'=>'cform-wrapper']) !!}
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <div class="input-field textarea-input">
                                        <textarea id="comment" name="text" class="materialize-textarea RTL_direction" style="height: 22px;"></textarea>
                                        <label for="comment" class="input-label">کامنت</label>
                                    </div>
                                    <div class="input-field submit-wrap">
                                        <button type="submit" class="waves-effect waves-light btn-large brand-bg white-text comm-submit regular-text">ارسال کامنت</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            @else
                                <h2 class="com-title RTL_direction">برای ثبت نظر باید <a href="/login" style="margin-left: 0px;padding-left: 0px;border-left: 0 solid #dddddd;">وارد</a> حساب کاربری خود شوید. اگر تا کنون ثبت نام نکردید
                                    <a href="/register" style="margin-left: 0px;padding-left: 0px;border-left: 0 solid #dddddd;">اینجا</a> کلیک کنید</h2>
                            @endif

                        </article>
                    </div> <!-- ./post container end-->
                    <div class="col-sm-4">
                        <div class="primary-sidebar">
                            <aside class="single-widget RTL_direction text-right">
                                <h2 class="widget-title">پست های اخیر</h2>
                                <ul>
                                    @foreach($recentPosts as $recentPost)
                                        <li>
                                            <a href="">{{$recentPost->title}}</a>
                                            <span class="text-left LTR_direction">{{$recentPost->created_at->format('Y/m/d')}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </aside>
                            <aside class="single-widget text-right RTL_direction">
                                <h2 class="widget-title">دسته بندی</h2>
                                <ul>
                                    @foreach($categories as $category)
                                        <li><a href="{{url('blog/category',$category->id)}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </aside>
                            @if(count($post->tags)>0)
                                <aside class="single-widget">
                                    <h2 class="widget-title text-right">تگ ها</h2>
                                    <div class="widget-text text-right">
                                        @foreach($post->tags as $tag)
                                            <a href="{{url('/blog/tag',$tag->id)}}" class="tags">{{$tag->name}}</a>
                                        @endforeach
                                    </div>
                                </aside>
                            @endif
                        </div>
                    </div> <!-- ./sidebar end-->
                    <!-- post container start-->

                </div>
            </div>
        </div> <!-- ./container end-->
    </section>  <!-- ./Blog Post Container end-->

    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->
</div> <!--#app end -->

<script>
    var token = '{{ Session::token() }}';
    var urlLike = '{{route('like')}}';
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{asset('libs/materialize/js/materialize.min.js')}}"></script>
<script src="{{asset('js/article.js')}}"></script>
</body>

</html>