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
    <title>صفحه ی شخصی امیررضا مهربخش &block; Amir Reza Mehrbakhsh Personal Site</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" >

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    {{--<link rel="stylesheet" href="{{asset('fonts/font-awesome/css/font-awesome.min.css')}}">--}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('libs/materialize/css/materialize.min.css')}}" media="screen,projection" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" media="screen,projection" />

    <link rel="stylesheet" href="{{asset('css/animate.css')}}" media="screen,projection" />
    <link href="{{asset('libs/frame-carousel/jquery.frame-carousel.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
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

<!-- Main Container -->
<main id="app" class="main-section">
    <!-- header navigation start -->
    @include('partials.header')
    <!-- #header  navigation end -->

    <!-- Blog Section end -->
    <section id="blog" class="scroll-section root-sec grey lighten-5 padd-tb-80 blog-wrap">
        <div class="padd-tb-60 brand-bg portfolio-top">
            <div class="portfolio-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="title text-right RTL_direction">بلاگ <span style="font-size: 30px;color: #fce99d;"> {{isset($selectedCategory) ? '&#10508; '.$selectedCategory->name : ''}}</span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .container end -->
        </div>
        <div class="container">
            <div class="row">
                <div class="blog-inner">
                    <div class="col-sm-12 card-box-wrap">
                        <div class="row">
                            <div class="clearfix card-element-wrapper" id="blog-posts">

                                @foreach($posts as $post)
                                    <article class="col-sm-6 col-md-4 single-card-box single-post">
                                        <div class="card wow fadeInUpSmall" data-wow-duration=".7s">
                                            <div class="card-image">
                                                <div class="card-img-wrap">
                                                    <div class="blog-post-thumb waves-effect waves-block waves-light">
                                                        <a href="{{route('posts.show',$post->slug)}}"><img class="activator" src="{{$post->photo ? asset('upload/post/'.$post->photo->path) : asset('images/single-blog.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-body">
                                                        <a href="{{route('posts.show',$post->slug)}}" class="post-title-link brand-text"><h2 class="post-title">{{$post->title}}</h2></a>
                                                        <p class="post-content text-justify RTL_direction"> {{$post->description}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix card-content">
                                                @if(Auth::check())
                                                    <a href="#" class="left post-like js-favorite EnFont {{Auth::user()->likes()->where('post_id',$post->id)->first() ? 'active' : ''}}" title="{{Auth::user()->likes()->where('post_id',$post->id)->first() ? 'شما قبلا این پست را لایک کرده اید' : 'لایک'}}" data-postid="{{$post->id}}"><i class="mdi-action-favorite"></i> <span class="numb">{{$post->likes}}</span></a>
                                                @else
                                                    <a href="#" class="left post-like EnFont " title="برای لایک کردن باید وارد شوید"><i class="mdi-action-favorite"></i> <span class="numb">{{$post->likes}}</span></a>
                                                @endif
                                                {{--<a href="#" class="left js-favorite" title="Love this"><i class="mdi-action-favorite"></i><span class="numb EnFont">{{$post->likes}}</span></a>--}}
                                                <a href="{{route('posts.show',$post->slug)}}" class="brand-text right waves-effect">ادامه مطلب</a>
                                            </div>
                                        </div>
                                    </article> <!-- ./single blog post end -->
                                @endforeach

                            </div> {{-- .card-element-wrapper #blog-posts --}}
                        </div> {{-- .row --}}
                    </div> {{-- .card-box-wrapp --}}
                </div> {{-- .blog-inner --}}
            </div>{{-- .row --}}
        </div> <!-- ./container -->
    </section>
    <!-- #blog Section end -->

    <!-- Footer Section end -->
    @include('partials.footer')
    <!-- #footer end -->

</main>
<!-- Main Container end-->

<script>
    var token = '{{ Session::token() }}';
    var urlLike = '{{route('like')}}';
</script>
<!-- JavaScripts -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{asset('js/jquery.easing.1.3.min.js')}}"></script>
<script src="{{asset('js/detectmobilebrowser.min.js')}}"></script>
<script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('libs/frame-carousel/jquery.frame-carousel.min.js')}}"></script>
<script src="{{asset('libs/materialize/js/materialize.min.js')}}"></script>
<script src="{{asset('js/common.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/myScript.js')}}"></script>

</body>
</html>