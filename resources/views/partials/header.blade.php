<header id="navigation" class="root-sec white nav">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="nav-inner">
                    <nav class="primary-nav">
                        <div class="clearfix nav-wrapper">
                            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                            <ul class="right static-menu">
                                <li class="search-form-li">
                                    <a id="initSearchIcon" class=""><i class="mdi-action-search"></i></a>
                                    <div class="search-form-wrap hide">
                                        <form action="#" class="">
                                            <label for="search" class="sr-only"></label>
                                            <input type="search" class="search" id="search">
                                            <button type="submit"><i class="mdi-action-search"></i></button>
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

                                <!-- Mini Profile // only visible in Tablet and Mobile -->
                                <li class="mobile-profile">
                                    <div class="profile-inner">
                                        <div class="pp-container">
                                            <img src="{{asset('images/picture_profile.jpg')}}" class="center-block" alt="">
                                        </div>
                                        <h3>امیررضا مهربخش</h3>
                                        <h5>طراح و توسعه دهنده ی وب</h5>
                                    </div>
                                </li><!-- mini profile end-->


                                <li><a href="/#contact" data-section="#contact" class="menu-smooth-scroll"><i class="fa fa-paper-plane fa-fw"></i>ارتباط با من</a></li>
                                <li><a href="/#blog" data-section="#blog" class="menu-smooth-scroll"><i class="fa fa-pencil fa-fw"></i>بلاگ</a></li>
                                <li><a href="/#team" data-section="#team" class="menu-smooth-scroll"><i class="fa fa-users fa-fw"></i>تیم</a></li>
                                <li><a href="/#resume" data-section="#resume" class="menu-smooth-scroll"><i class="fa fa-file-text fa-fw"></i>مهارت ها</a></li>
                                <li><a href="/#about" data-section="#about" class="menu-smooth-scroll"><i class="fa fa-user fa-fw"></i>درباره من</a></li>
                            </ul>
                            <ul id="static-dropdown" class="inline-menu submenu-ul dropdown-content text-right">
                                @if(!Auth::check())
                                    <li><a href="{{url('/register')}}">ثبت نام</a></li>
                                    <li><a href="{{url('/login')}}">ورود</a></li>
                                @endif

                                @if(Auth::check())
                                    <li class="disabled" style="cursor:default;">{{Auth::user()->name}}</li>
                                    @if(Auth::user()->role_id == 1)
                                        <li><a href="{{url('/profile/edit')}}">ویرایش پروفایل</a></li>
                                    @else
                                        <li><a href="{{url('/admin')}}">پنل</a></li>
                                    @endif
                                    <li><a href="{{url('/logout')}}">خروج</a></li>
                                @endif
                            </ul>
                        </div>{{-- .nav-wrapper --}}
                    </nav>{{-- .primary-nav --}}
                </div> {{-- .nav-inner --}}
            </div> {{-- .col --}}
        </div> {{-- .row --}}
    </div><!-- .container -->
</header>