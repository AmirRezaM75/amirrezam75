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
    <title>Post Title | MaterialX - Material Design Personal Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" >

    <!-- Stylesheets-->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('libs/materialize/css/materialize.min.css')}}" media="screen,projection" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" media="screen,projection"/>
    <link rel="stylesheet" href="{{asset('libs/owl-carousel/owl.carousel.min.css')}}" media="screen,projection" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">

    <!-- Choose your default colors -->
    <link rel="stylesheet" href="{{asset('css/colors/color1.css')}}">

    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.js')}}"></script>
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
    <header id="navigation" class="root-sec white nav">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="nav-inner">
                        <nav class="primary-nav">
                            <div class="clearfix nav-wrapper">
                                <a href="#home" class="left brand-logo menu-smooth-scroll" data-section="#home"><img src="{{asset('images/logo.png')}}" alt="">
                                </a>
                                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                                <ul class="right static-menu">
                                    <li class="search-form-li">
                                        <a id="initSearchIcon" class=""><i class="mdi-action-search"></i> </a>
                                        <div class="search-form-wrap hide">
                                            <form action="#" class="">
                                                <input type="search" class="search">
                                                <button type="submit"><i class="mdi-action-search"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="dropdown-button blog-submenu-init" href="#!" data-activates="dropdown1">
                                            <i class="mdi-navigation-more-vert right"></i>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="inline-menu side-nav" id="mobile-demo">

                                    <!-- Mini Profile // only visible in Tab and Mobile -->
                                    <li class="mobile-profile">
                                        <div class="profile-inner">
                                            <div class="pp-container">
                                                <img src="{{asset('images/picture_profile_2.jpg')}}" class="center-block" alt="">
                                            </div>
                                            <h3>امیررضا مهربخش</h3>
                                            <h5>طراح سایت</h5>
                                        </div>
                                    </li><!-- mini profile end-->


                                    <li><a href="#about" data-section="#about" class="menu-smooth-scroll"><i class="fa fa-user fa-fw"></i>درباره من</a>
                                    </li>
                                    <li><a href="#resume" data-section="#resume" class="menu-smooth-scroll"><i class="fa fa-file-text fa-fw"></i>رزومه</a>
                                    </li>
                                    <li><a href="#portfolio" data-section="#portfolio" class="menu-smooth-scroll"><i class="fa fa-briefcase fa-fw"></i>نمونه کار</a>
                                    </li>
                                    <li><a href="#team" data-section="#team" class="menu-smooth-scroll"><i class="fa fa-users fa-fw"></i>تیم</a>
                                    </li>
                                    <li><a href="#blog" data-section="#blog" class="menu-smooth-scroll"><i class="fa fa-pencil fa-fw"></i>بلاگ</a>
                                    </li>
                                    <li><a href="#contact" data-section="#contact" class="menu-smooth-scroll"><i class="fa fa-paper-plane fa-fw"></i>ارتباط با ما</a>
                                    </li>
                                </ul>
                                <ul id="dropdown1" class="inline-menu submenu-ul dropdown-content">
                                    <li class="disabled"><a href="#/">خانه</a> </li>
                                    @if(!Auth::check())
                                        <li><a href="/register">ثبت نام</a></li>
                                        <li><a href="/login">ورود</a></li>
                                    @endif

                                    @if(Auth::check())
                                        <li><a href="/admin">پنل</a></li>
                                        <li><a href="/logout">خروج</a></li>
                                    @endif

                                    <li><a href="#/">سایت تیم</a></li>
                                </ul>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- .container end -->
    </header>
    <!-- #header  navigation end -->

    <!-- Banner start -->
    <section id="banner" class="root-sec brand-bg padd-tb-55 single-banner blogpage-banner-wrap">
        <div class="container">
            <div class="row">
                <div class="clearfix blog-banner-text blog-single-banner">
                    <div class="col-md-12">
                        <h2 class="title RTL_direction text-right">{{$post->title}}</h2>
                        <ul class="clearfix blog-post-meta pull-right">
                            <li>By <a href="#" class="EnFont">{{$post->user->username}}</a>
                            </li>
                            <li>{{$post->created_at}}</li>
                            <li><a href="#comments" data-section="#comments" class="menu-smooth-scroll EnFont">{{$commentsCount}} Comments</a>
                            </li>
                            <li><a href="#">طراحی سایت</a>
                            </li>
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
                    <div class="col-sm-4">
                        <div class="primary-sidebar">
                            <aside class="single-widget RTL_direction text-right">
                                <h2 class="widget-title">پست های اخیر</h2>
                                <ul>
                                    <li>
                                        <a href="">بررسی آیفون 6+</a>
                                        <span>March 24, 2015</span>
                                    </li>
                                    <li>
                                        <a href="">راهنمای تروفی های Uncharted</a>
                                        <span>March 24, 2015</span>
                                    </li>
                                    <li>
                                        <a href="">بررسی گوشی One Plus 3</a>
                                        <span>March 24, 2015</span>
                                    </li>
                                    <li>
                                        <a href="">نقد و بررسی فیلم دزدان دریایی</a>
                                        <span>March 24, 2015</span>
                                    </li>
                                </ul>
                            </aside>
                            <aside class="single-widget text-right RTL_direction">
                                <h2 class="widget-title">دسته بندی</h2>
                                <ul>
                                    <li><a href="#">طراحی سایت</a>
                                    </li>
                                    <li><a href="#">آموزش ویدیویی</a>
                                    </li>
                                    <li><a href="#">بازی</a>
                                    </li>
                                    <li><a href="#">نقد و بررسی</a>
                                    </li>
                                    <li><a href="#">تورنومنت</a>
                                    </li>
                                </ul>
                            </aside>
                            @if(count($post->tags)>0)
                                <aside class="single-widget">
                                    <h2 class="widget-title text-right">تگ ها</h2>
                                    <div class="widget-text text-right">
                                        @foreach($post->tags as $tag)
                                            <a href="#" class="tags">{{$tag->name}}</a>
                                        @endforeach
                                    </div>
                                </aside>
                            @endif
                        </div>
                    </div> <!-- ./sidebar end-->
                    <!-- post container start-->
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
                                    <a href="#" class="left post-like js-favorite EnFont {{Auth::user()->likes()->where('post_id',$post->id)->first() ? 'active' : ''}}" title="Love this" data-postid="{{$post->id}}"><i class="mdi-action-favorite"></i> <span class="numb">{{$post->likes}}</span></a>
                                @else
                                    <a href="#" class="left post-like EnFont " title="برای لایک کردن باید وارد شوید"><i class="mdi-action-favorite"></i> <span class="numb">{{$post->likes}}</span></a>
                                @endif
                                <ul class="clearfix right share-post">
                                    <li><a href="#"><i class="fa fa-facebook"></i> <span>SHARE</span></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter"></i> <span>TWEET</span></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i> <span>PLUS</span></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="comment-reply-section" id="comments">
                                <h2 class="com-title EnFont">{{$commentsCount}} Comments</h2>
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
                                        <label for="comment" class="input-label">Comment</label>
                                    </div>
                                    <div class="input-field submit-wrap">
                                        <button type="submit" class="waves-effect waves-light btn-large brand-bg white-text comm-submit regular-text">SEND MESSAGE</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                @else
                                <h2 class="com-title RTL_direction">برای ثبت نظر باید <a href="/login" style="margin-left: 0px;padding-left: 0px;border-left: 0 solid #dddddd;">وارد</a> حساب کاربری خود شوید. اگر تا کنون ثبت نام نکردید
                                    <a href="/register" style="margin-left: 0px;padding-left: 0px;border-left: 0 solid #dddddd;">اینجا</a> کلیک کنید</h2>
                                @endif

                        </article>
                    </div> <!-- ./post container end-->
                </div>
            </div>
        </div> <!-- ./container end-->
    </section>  <!-- ./Blog Post Container end-->

    <!-- Footer Start -->
    <footer id="footer" class="root-sec white root-sec footer-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="clearfix footer-inner">
                        <ul class="media-float-none social-icons">
                            <li><a href="#" class="tooltips tooltipped facebook" data-position="top" data-delay="50" data-tooltip="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#" class="tooltips tooltipped linkedin" data-position="top" data-delay="50" data-tooltip="Linkdin"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li><a href="#" class="tooltips tooltipped twitter" data-position="top" data-delay="50" data-tooltip="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#" class="tooltips tooltipped google-plus" data-position="top" data-delay="50" data-tooltip="Google Plus"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li><a href="#" class="tooltips tooltipped dribbble" data-position="top" data-delay="50" data-tooltip="Dribbble"><i class="fa fa-dribbble"></i></a>
                            </li>
                            <li><a href="#" class="tooltips tooltipped behance" data-position="top" data-delay="50" data-tooltip="Behance"><i class="fa fa-behance"></i></a>
                            </li>
                        </ul>
                        <div class="media-float-none copyright EnFont">
                            <p>MaterialX &copy; All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> <!-- Footer End -->
</div> <!--#app end -->

<script>
    var token = '{{ Session::token() }}';
    var urlLike = '{{route('like')}}';
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('libs/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('libs/materialize/js/materialize.min.js')}}"></script>
<script src="{{asset('libs/jwplayer/jwplayer.min.js')}}"></script>
<script src="{{asset('js/common.js')}}"></script>
<script src="{{asset('js/myScript.js')}}"></script>
</body>

</html>