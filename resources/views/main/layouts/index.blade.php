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
    <meta name="description" content="{{$about->text}}">
    <meta name="keywords" content="Amir Reza Mehrbakhsh, amirrezam75, امیررضا مهربخش">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" >

    <!-- Stylesheets -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('libs/materialize/css/materialize.min.css')}}" media="screen,projection" />
    <link rel="stylesheet" href="{{elixir('css/index-all.css', null)}}" media="screen,projection" />
    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <![endif]-->
</head>
<body>


<!-- start option panel -->
@include('partials.option-panel')
<!-- end option panel -->

<div id="show" class="btn-floating waves-effect waves-light btn-large brand-text">
    <i class="fa fa-cog"></i>
</div>
<!-- end option panel -->

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
    <!-- #header navigation end -->

    <!-- Home Section start -->
    <section id="home" class="scroll-section root-sec grey lighten-5 home-wrap">
        <div class="sec-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="home-inner">
                            <div class="center-align home-content">
                                <h1 class="home-title">سلام، <span>امیررضا مهربخش</span> هستم</h1>
                                <h2 class="home-subtitle RTL_direction">طراح و توسعه دهنده&zwnj;ی وب از شرکت داکیا</h2>
                                <a href="#contact" class="hire-me-btn btn waves-effect waves-light btn-large brand-bg white-text regular-text">دعوت به همکاری <i class="mdi-content-send left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .container end -->
            <div class="section-call-to-area">
                <div class="container">
                    <div class="row">
                        <a href="#about" class="btn-floating btn-large button-middle call-to-about section-call-to-btn animated btn-up btn-hidden" data-section="#about">
                            <i class="mdi-navigation-expand-more"></i>
                        </a>
                    </div>
                </div>
                <!-- .container end -->
            </div>
        </div>
    </section>
    <!-- #home Section end -->

    <!-- About Section start -->
    <section id="about" class="scroll-section root-sec padd-tb-60 grey lighten-5 about-wrap">
        <div class="container">
            <div class="row">
                <div class="clearfix about-inner">


                    <div class="col-sm-12 col-md-4">
                        <div class="person-about">
                            <h3 class="about-subtitle">درباره ی من</h3>
                            <p>{{$about->text}}</p>
                            <a href="https://atbox.io/amirrezam75/resume" target="_blank" class="waves-effect waves-light btn-large brand-bg white-text"><i class="mdi-content-archive left"></i>دانلود رزومه </a>
                        </div>
                    </div>
                    <!-- about me description -->

                    <div class="col-sm-6 col-md-4">
                        <div class="person-img wow fadeIn">
                            <img class="z-depth-1" itemprop="image" src="{{asset('images/picture_profile.jpg')}}" alt="photo of Amir Reza Mehrbakhsh" title="Amir Reza Mehrbakhsh">
                        </div>
                    </div>
                    <!-- about me image -->

                    <div class="col-sm-6 col-md-4">
                        <div class="person-info">
                            <h3 class="about-subtitle">اطلاعات شخصی</h3>
                            <h5><span>نام :</span> <span itemprop="name">{{$about->name}}</span></h5>
                            <h5><span>سن :</span> {{date('Y') - $about->birthday}} </h5>
                            <h5><span>شغل :</span> <span itemprop="jobTitle">{{$about->job}}</span> </h5>
                            <h5><span>ایمیل :</span> <a href="mailto:{{$about->email}}" class="EnFont">{{$about->email}}</a> </h5>
                        </div>
                    </div>
                    <!-- about me info -->

                </div>
            </div>
        </div>
        <!-- .container end -->
    </section>
    <!-- #about Section end -->

    <!-- Resume Section start -->
    <section id="resume" class="scroll-section">
        <section id="skill" class="root-sec white skill-wrap">
            <div class="sec-overlay">
                <div class="container">
                    <div class="row">
                        <div class="clearfix skill-inner">
                            <div class="col-sm-12 col-md-3">
                                <div class="skill-left">
                                    <h2 class="title">مهارت ها</h2>
                                    <p class="regular-text">میزان درصد زمانی که به هر مهارت اختصاص دادم را در اینجا می بینیم</p>
                                </div>
                            </div>


                            <!-- skills container -->
                            <div class="col-sm-12 col-md-6 col-md-offset-1">
                                <div class="skill-right">
                                    <div id="skillSlider" class="clearfix skill-graph owl-carousel owl-theme">

                                        @foreach($skills as $skill)
                                            <div class="single-skill">
                                                <div class="after-li">
                                                    <div class="singel-hr">
                                                        <div class="singel-hr-inner" data-height="{{$skill->percentage}}%">
                                                            <div class="skill-visiable">
                                                                <span class="skill-title">{{$skill->name}}</span>
                                                                <div class="hr-wrap">
                                                                    <div class="hrc"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="skill-count">{{$skill->percentage}}<span class="EnFont">%</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div><!-- /skills container -->
                        </div><!-- /skill inner -->
                    </div><!-- /Row -->
                </div><!-- /Container -->
            </div><!-- /sec overlay -->
            <!-- .container end -->
        </section>
    </section>
    <!-- #resume Section end -->

    <!-- Team Section start -->
    <section id="team" class="scroll-section root-sec brand-bg padd-tb-120 team-wrap">
        <div class="container">
            <div class="row">
                <div class="clearfix team-inner">
                    <div class="col-sm-12 col-md-10 col-md-offset-1 card-box-wrap">
                        <div class="row">
                            <div class="clearfix section-head team-text">
                                <div class="col-sm-12">
                                    <h2 class="title text-right">اعضای تیم</h2>
                                    <p class="regular-text text-right RTL_direction">اعضای تیم تیوان که نزدیک به پنج سال هست که با این گروه به عنوان فریلنسر کار میکنم.  </p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="overflow-hidden">
                                    <div class="row">
                                        <div id="teamSlider" class="clearfix owl-carousel owl-theme card-element-wrapper">
                                            @foreach ($members as $member)
                                                <div class="col-sm-4 single-card-box wow fadeInUpSmall" data-wow-duration=".7s">
                                                    <div class="card">
                                                        <div class="card-image waves-effect waves-block waves-light">
                                                            <div class="card-img-wrap">
                                                                <img class="activator" src="{{asset('upload/member/'.$member->photo->path)}}" alt="{{$member->name}}">
                                                            </div>
                                                        </div>
                                                        <div class="card-content">
                                                            <span class="card-title activator brand-text">{{$member->name}}<i class="mdi-navigation-more-vert right"></i></span>
                                                            <p>{{$member->role}}</p>
                                                        </div>
                                                        <div class="card-reveal">
                                                            <div class="rev-title-wrap">
                                                                <span class="card-title activator brand-text">{{$member->name}}<i class="mdi-navigation-close right"></i></span>
                                                                <p>{{$member->role}}</p>
                                                            </div>
                                                            <p class="rev-content text-right RTL_direction">
                                                                {{$member->text}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- #teamSlider end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- .container -->
    </section>
    <!-- #team Section end -->

    <!-- #blog Section start -->
    <section id="blog" class="scroll-section root-sec grey lighten-5 blog-wrap">
        <div class="sec-inner padd-tb-120">
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
                                                            <a href="{{route('posts.show',$post->slug)}}"><img class="activator" src="{{$post->photo ? asset('upload/post/'.$post->photo->path) : asset('images/single-blog.png')}}" alt=""></a>
                                                        </div>
                                                        <div class="post-body">
                                                            <a href="{{route('posts.show',$post->slug)}}" class="post-title-link brand-text"><h2 class="post-title">{{$post->title}}</h2></a>
                                                            <p class="post-content text-justify RTL_direction"> {{$post->description}} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix card-content">
                                                    <a href="#" class="left js-favorite" title="تعداد لایک ها"><i class="mdi-action-favorite"></i><span class="numb EnFont">{{$post->likes}}</span></a>
                                                    <a href="{{route('posts.show',$post->slug)}}" class="brand-text right waves-effect">ادامه مطلب</a>
                                                </div>
                                            </div>
                                        </article> <!-- ./single blog post end -->
                                    @endforeach



                                </div>
                                <div class="clearfix left-align">
                                    <div class="col-sm-12">
                                        <a href="/blog" class="waves-effect waves-light btn-large load-more">مشاهده بیشتر</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- ./container -->
        </div>
    </section>
    <!-- #blog Section end -->

    <!-- Contact Section end -->
    <section id="contact" class="scroll-section root-sec brand-bg padd-tb-120 contact-wrap">
        <div class="container">
            <div class="row">
                <div class="contact-inner">
                    <div class="col-sm-12 card-box-wrap">
                        <div class="row">
                            <div class="clearfix section-head contact-text">
                                <div class="col-sm-12">
                                    <h2 class="title">تماس با من</h2>
                                </div>
                            </div> <!-- contact text end -->

                            <div class="clearfix contact-form">

                                <!-- Map Start -->
                                <div class="col-sm-7">
                                </div> <!-- Map end -->

                                <!-- Contact Form start -->
                                <div class="col-sm-5">
                                    <div class="clearfix card-panel grey lighten-5 cform-wrapper">

                                        <form action="{{route('ajax.contact')}}" id="contact-form" method="post">
                                            {{csrf_field()}}
                                            {{method_field('POST')}}

                                            <div class="input-field">
                                                <input id="contact_name" type="text" name="name" class="validate input-box" required>
                                                <label for="contact_name" class="input-label">نام</label>
                                            </div>
                                            <div class="input-field">
                                                <input id="contact_email" type="email" name="email" class="validate input-box EnFont" required>
                                                <label for="contact_email" class="input-label">ایمیل</label>
                                            </div>
                                            <div class="input-field">
                                                <input id="contact_subject" type="text" name="subject" class="validate input-box" required>
                                                <label for="contact_subject" class="input-label">موضوع</label>
                                            </div>
                                            <div class="input-field textarea-input">
                                                <textarea id="contact_message" name="message" class="validate materialize-textarea" style="height: 22px;"></textarea>
                                                <label for="contact_message" class="input-label">متن پیام</label>
                                            </div>
                                            <div class="input-field submit-wrap clearfix">
                                                <button type="button" class="left waves-effect btn-flat brand-text submit-btn">فرستادن پیام</button>
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- ./contact form end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ./container end -->
    </section>
    <!-- #contact Section end -->

    {{--TODO: add carousel_media feature--}}
    <section id="instagram-content">
        @foreach($feeds as $feed)
            <a href="{{url($feed->link)}}" target="_blank" class="post">
                <div class="shell EnFont">
                    <span><i class="fa fa-comment"></i>{{$feed->comments->count}}</span>
                    <span><i class="fa fa-heart"></i>{{$feed->likes->count}}</span>
                </div>
                <div class="image" style="background-image: url({{$feed->images->standard_resolution->url}})">

                </div>
            </a>
        @endforeach
            {{--TODO: create a seperate component for call-to-area button--}}
            <div class="section-call-to-area">
                <div class="container">
                    <div class="row">
                        <a href="#home" class="btn-floating btn-large button-middle call-to-home section-call-to-btn animated btn-up btn-hidden" data-section="#home">
                            <i class="mdi-navigation-expand-less"></i>
                        </a>
                    </div>
                </div>
            </div>
    </section>

    <!-- Footer Section end -->
    @include('partials.footer')
    <!-- #footer end -->

</main>
<!-- Main Container end-->


<!-- JavaScripts -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
    var token = '{{ Session::token() }}';
    var urlContact = '{{route('ajax.contact')}}';
</script>
<script type="text/javascript" src="{{elixir('js/index-all.js', null)}}"></script>


</body>
</html>