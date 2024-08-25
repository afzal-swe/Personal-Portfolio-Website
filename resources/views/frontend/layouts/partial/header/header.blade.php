
@php
    $route = Route::current()->getName();
@endphp

<header>
    <div id="sticky-header" class="menu__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu__wrap">
                        <nav class="menu__nav">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <h1 class="text-primary">Md.Afzal Hossen</h1>
                                </a>
                                {{-- <a href="index.html" class="logo__black"><img src="{{ asset('frontend/assets/img/logo/logo_black.png') }}" alt=""></a> --}}
                                {{-- <a href="index.html" class="logo__white"><img src="{{ asset('frontend/assets/img/logo/logo_white.png') }}" alt=""></a> --}}
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class=" {{ ($route == 'home') ? 'active':'' }}"><a href="{{ url('/') }}">Home</a></li>
                                    <li class=" {{ ($route == 'about') ? 'active':'' }}"><a href="{{ route('about') }}">About</a></li>
                                    <li> <a href="services-details.html">Services</a></li>
                                    <li class=" {{ ($route == 'portfolio') ? 'active':'' }}"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                                    <li class=" {{ ($route == 'blog') ? 'active':'' }}"><a href="{{ route('blog') }}">Our Blog</a></li>
                                    {{-- <li class="menu-item-has-children"><a href="#">Our Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Our News</a></li>
                                            <li><a href="blog-details.html">News Details</a></li>
                                        </ul>
                                    </li> --}}
                                    <li class=" {{ ($route == 'contact') ? 'active':'' }}"><a href="{{ route('contact') }}">contact me</a></li>
                                </ul>
                            </div>
                            <div class="header__btn d-none d-md-block">
                                <a href="{{ route('contact') }}" class="btn">Contact me</a>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile__menu">
                        <nav class="menu__box">
                            <div class="close__btn"><i class="fal fa-times"></i></div>
                            <div class="nav-logo">
                                <h2>Md.Afzal Hossen</h2>
                                {{-- <a href="index.html" class="logo__black"><img src="{{ asset('frontend/assets/img/logo/logo_black.png') }}" alt=""></a>
                                <a href="index.html" class="logo__white"><img src="{{ asset('frontend/assets/img/logo/logo_white.png') }}" alt=""></a> --}}
                            </div>
                            <div class="menu__outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="{{ $socials->linkedin ?? '#' }}"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="{{ $socials->facebook ?? '#' }}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $socials->instagram ?? '#' }}"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ $socials->twitter ?? '#' }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $socials->github ?? '#' }}"><i class="fab fa-github"></i></a></li>
                                    <li><a href="{{ $socials->youtube ?? '#' }}"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu__backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>