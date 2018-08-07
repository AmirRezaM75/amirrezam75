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
    <link rel="stylesheet" href="{{asset('libs/sweetalert/sweet-alert.min.css')}}" media="screen,projection" />

    <link rel="stylesheet" href="{{asset('libs/owl-carousel/owl.carousel.min.css')}}" media="screen,projection" />
    <link rel="stylesheet" href="{{asset('libs/owl-carousel/owl.theme.default.min.css')}}" media="screen,projection" />
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


<!-- start option panel -->
<div id="switch">
    <div class="content-switcher">
        <p class="brand-text">Color Options:</p>
        <ul class="header">
            <li><a href="#" onclick="setActiveStyleSheet('color1'); return false;" class="button color switch" style="background-color:#00bcd4"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color2'); return false;" class="button color switch" style="background-color:#ff4081"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color3'); return false;" class="button color switch" style="background-color:#C043D5"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color4'); return false;" class="button color switch" style="background-color:#73D077"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color5'); return false;" class="button color switch" style="background-color:#FE7448"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color6'); return false;" class="button color switch" style="background-color:#1ABBAC"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color7'); return false;" class="button color switch" style="background-color:#EAB82E"></a></li>
            <li><a href="#" onclick="setActiveStyleSheet('color8'); return false;" class="button color switch" style="background-color:#799CAC"></a></li>
        </ul>
        <p class="brand-text">Menu Options:</p>
        <div class="menu-select" title="The menu will display in all devices">
            <input type="radio" id="menu1" name="intelligent-menu">
            <label for="menu1">Fixed</label>
        </div>
        <div class="menu-select" title="The menu will display or hide in all devices depending on scroll">
            <input type="radio" id="menu2" name="intelligent-menu" checked="checked">
            <label for="menu2">Intelligent ( Auto Hide )</label>
        </div>
        <div class="menu-select" title="Fixed menu will apply in non-mobile devices and Intelligent menu will apply in mobile devices">
            <input type="radio" id="menu3" name="intelligent-menu">
            <label for="menu3">Mobile Intelligent</label>
        </div>
        <div id="hide">
            <i class="fa fa-times"></i>
        </div>
    </div>
</div>
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
                                    @if(Auth::check())
                                        <li>
                                            <a class="dropdown-button blog-submenu-init" href="#!" data-activates="static-dropdown" style="padding: 0;">
                                                <img src="{{Auth::user()->photo ? asset('upload/profile/'.Auth::user()->photo->path) : asset('images/user.png')}}" class="img-circle margin-top-20" height="40" alt="">
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a class="dropdown-button blog-submenu-init" href="#!" data-activates="static-dropdown">
                                                <i class="mdi-navigation-more-vert right"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                                <ul class="inline-menu side-nav" id="mobile-demo">

                                    <!-- Mini Profile // only visible in Tab and Mobile -->
                                    <li class="mobile-profile">
                                        <div class="profile-inner">
                                            <div class="pp-container">
                                                <img src="{{asset('images/picture_profile.jpg')}}" class="center-block" alt="">
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
                                <ul id="static-dropdown" class="inline-menu submenu-ul dropdown-content text-right">
                                    @if(!Auth::check())
                                        <li><a href="/register">ثبت نام</a></li>
                                        <li><a href="/login">ورود</a></li>
                                    @endif

                                    @if(Auth::check())
                                        <li class="disabled" style="cursor:default;">{{Auth::user()->name}}</li>
                                        @if(Auth::user()->role_id == 1)
                                        <li><a href="{{url('/profile/edit')}}">ویرایش پروفایل</a></li>
                                        @else
                                        <li><a href="/admin">پنل</a></li>
                                        @endif
                                        <li><a href="/logout">خروج</a></li>
                                    @endif

                                    {{--<li><a href="#/">سایت تیم</a></li>--}}
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

    <!-- Home Section start -->
    <section id="home" class="scroll-section root-sec grey lighten-5 home-wrap">
        <div class="sec-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="home-inner">
                            <div class="center-align home-content">
                                <h1 class="home-title">سلام، <span>امیررضا مهربخش</span> هستم</h1>
                                <h2 class="home-subtitle RTL_direction">طراح UI/UX از گروه تیوان</h2>
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
                            <a class="waves-effect waves-light btn-large brand-bg white-text"><i class="mdi-content-archive left"></i> دانلود رزومه </a>
                        </div>
                    </div>
                    <!-- about me description -->

                    <div class="col-sm-6 col-md-4">
                        <div class="person-img wow fadeIn">
                            <img class="z-depth-1" src="{{asset('images/picture_profile.jpg')}}" alt="picture_profile" title="Amir Reza Mehrbakhsh">
                        </div>
                    </div>
                    <!-- about me image -->

                    <div class="col-sm-6 col-md-4">
                        <div class="person-info">
                            <h3 class="about-subtitle">اطلاعات شخصی</h3>
                            <h5><span>نام :</span> {{$about->name}}</h5>
                            <h5><span>سن :</span> {{date('Y') - $about->birthday}} </h5>
                            <h5><span>شغل :</span> {{$about->job}} </h5>
                            <h5><span>ایمیل :</span> <span class="EnFont">{{$about->email}}</span></h5>
                            <h5><span>آدرس :</span> {{$about->address}}</h5>
                        </div>

                        <div class="about-social">
                            <ul>
                                <li>
                                    <a href="#" class="btn-floating waves-effect waves-light white"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-floating waves-effect waves-light white"><i class="fa fa-telegram"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-floating waves-effect waves-light white"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-floating waves-effect waves-light white"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-floating waves-effect waves-light white"><i class="fa fa-pinterest"></i></a>
                                </li>
                            </ul>
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
                                    <p class="regular-text">در این نمودار مهارت هایی که تا به اینجا کسب کردم و میزان تسلط من به آنها را میبینیم.</p>
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

    <!-- Portfolio Section start -->
    <section id="portfolio" class="scroll-section root-sec white portfolio-wrap">
        <div class="padd-tb-60 brand-bg portfolio-top">
            <div class="portfolio-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="title text-right">نمونه کار</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .container end -->
        </div>

        <div class="portfolio-bottom">
            <div class="container">
                <div class="row hidden-xs">
                    <div class="col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1">
                        <div class="fc-mac"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #portfolio Section end -->

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
                                    <p class="regular-text text-right RTL_direction">تیم "تیوان" شامل افرادی با سلیقه و با روحیه خوب میباشند که هر کدام در زمینه ی خودشان عالی هستند.مهمترین چیز در این تیم حفظ احترام و دوستی هست.</p>
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

    <!-- Funfacts Section start -->
    <section id="funfacts" class="root-sec grey lighten-5 funfact-wrap">
        <div class="sec-inner padd-tb-120">
            <div class="container">
                <div class="row">
                    <div class="funfact-inner">
                        <div class="col-sm-4 funfact-box">
                            <div class="center-align card-panel white">
                                <div class="feature-box-outer">
                                    <div class="funfact-box-inner">
                                        <div class="clearfix ">
                                            <i class="mdi-editor-insert-emoticon"></i>
                                            <span class="num countNumb">0</span>
                                        </div>
                                        <div class="context">مشتریان راضی</div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- ./single fun fact box -->
                        <div class="col-sm-4 funfact-box">
                            <div class="center-align card-panel white">
                                <div class="feature-box-outer">
                                    <div class="funfact-box-inner">
                                        <div class="clearfix ">
                                            <i class="mdi-action-wallet-travel"></i>
                                            <span class="num countNumb">0</span>
                                        </div>
                                        <div class="context">پروژه های تکمیل شده</div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- ./single fun fact box -->
                        <div class="col-sm-4 funfact-box">
                            <div class="center-align card-panel white">
                                <div class="feature-box-outer">
                                    <div class="funfact-box-inner">
                                        <div class="clearfix ">
                                            <i class="mdi-action-wallet-giftcard"></i>
                                            <span class="num countNumb">0</span>
                                        </div>
                                        <div class="context">جوایز</div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- ./single fun fact box -->
                    </div>
                </div>

            </div>  <!-- .container end -->
        </div>
    </section>
    <!-- #funfacts Section end -->

    <!-- Blog Section end -->
    <section id="blog" class="scroll-section root-sec grey lighten-5 blog-wrap">
        <div class="padd-tb-60 brand-bg portfolio-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="title text-right">بلاگ</h2>
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
                                                        <a href="{{route('posts.show',$post->id)}}"><img class="activator" src="{{$post->photo ? asset('upload/post/'.$post->photo->path) : asset('images/single-blog.png')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-body">
                                                        <a href="{{route('posts.show',$post->id)}}" class="post-title-link brand-text"><h2 class="post-title">{{$post->title}}</h2></a>
                                                        <p class="post-content text-justify RTL_direction"> {{$post->description}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix card-content">
                                                <a href="#" class="left js-favorite" title="Love this"><i class="mdi-action-favorite"></i><span class="numb EnFont">{{$post->likes}}</span></a>
                                                <a href="{{route('posts.show',$post->id)}}" class="brand-text right waves-effect">ادامه مطلب</a>
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
                                    <h2 class="title">تماس با ما</h2>
                                    <p class="subtitle">برای ثبت سفارش میتوانید از طریق فرم زیر یا با ایمیل <a class="EnFont" href="mailto:amirrezax@hotmail.com">amirrezax@hotmail.com</a> در تماس باشید.</p>
                                </div>
                            </div> <!-- contact text end -->

                            <div class="clearfix contact-form">

                                <!-- Map Start -->
                                <div class="col-sm-7">
                                </div> <!-- Map end -->

                                <!-- Contact Form start -->
                                <div class="col-sm-5">
                                    <div class="clearfix card-panel grey lighten-5 cform-wrapper">

                                        {!! Form::open(['method'=>'POST', 'action'=>'ContactController@createMessage','id'=>'contactForm']) !!}

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
                                                <button type="submit" class="left waves-effect btn-flat brand-text submit-btn">فرستادن پیام</button>
                                                <div class="right form-loader-area">
                                                    <svg class="circular size-20" height="20" width="20">
                                                        <circle class="path" cx="10" cy="10" r="7" fill="none" stroke-width="3" stroke-miterlimit="10" />
                                                    </svg>
                                                </div>
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div> <!-- ./contact form end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ./container end -->
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
    <!-- #contact Section end -->

    <!-- Footer Section end -->
    <footer id="footer" class="root-sec white root-sec footer-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="clearfix footer-inner">
                        <ul class="left social-icons">
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
                        </ul> <!-- ./social icons end -->
                        <div class="right copyright">
                            <p>T1-Group <span class="EnFont">&copy;</span> All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ./container end-->
    </footer>
    <!-- #footer end -->

</main>
<!-- Main Container end-->


<!-- JavaScripts -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{asset('js/jquery.easing.1.3.min.js')}}"></script>
<script src="{{asset('js/detectmobilebrowser.min.js')}}"></script>
<script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('libs/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('libs/frame-carousel/jquery.frame-carousel.min.js')}}"></script>
<script src="{{asset('libs/materialize/js/materialize.min.js')}}"></script>
<script src="{{asset('libs/jwplayer/jwplayer.min.js')}}"></script>
<script src="{{asset('libs/sweetalert/sweet-alert.min.js')}}"></script>
<script src="{{asset('js/common.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

<script type="text/javascript">
    $(function(){
        $('.fc-mac').frameCarousel({
            images: [
                'images/portfolio/portfolio1.jpg',
                'images/portfolio/portfolio2.jpg'],
            frame: 'images/frame.png',
            frameSize: [
                {
                    width: 500,
                    minScreenWidth: 768,
                    maxScreenWidth: 991
                },
                {
                    width: 620,
                    minScreenWidth: 992,
                    maxScreenWidth: 1199
                },
                {
                    width: 800,
                    minScreenWidth: 1200
                }]
        });
    });
</script>
</body>
</html>