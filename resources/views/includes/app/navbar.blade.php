<!-- main header -->
<header class="main-header style-one">
    <!-- header-lower -->
    <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ route('home') }}"><img src="{{ url('frontend/assets/images/logo.png') }}" alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="{{ Route::currentRouteName() == 'home' ? 'current' : '' }}">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="{{ Route::currentRouteName() == 'jadwal-travel' ? 'current' : '' }}">
                                    <a href="{{ route('jadwal-travel') }}">Travel</a>
                                </li>
                                <li class="{{ Route::currentRouteName() == 'kontak' ? 'current' : '' }}">
                                    <a href="{{ route('kontak') }}">Kontak</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <ul class="menu-right-content clearfix">
                    <li class="user-link">
                        @if (Auth::check())
                            @if (Auth::user()->roles == 'ADMIN')
                                <!-- Jika user adalah ADMIN, arahkan ke Dashboard -->
                                <a href="{{ route('dashboard') }}"><i class="icon-Profile"></i></a>
                            @else
                                <!-- Jika user bukan ADMIN, munculkan ikon profil dengan dropdown logout -->
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-Profile"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form action="{{ url('logout') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @else
                            <!-- Jika user belum login, arahkan ke halaman login -->
                            <a href="{{ url('login') }}"><i class="icon-Profile"></i></a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ route('home') }}"><img src="{{ url('frontend/assets/images/logo.png') }}" alt=""></a></figure>
                </div>
                <div class="menu-area">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <ul class="menu-right-content clearfix">
                    <li class="user-link">
                        @if (Auth::check())
                            @if (Auth::user()->roles == 'ADMIN')
                                <!-- Jika user adalah ADMIN, arahkan ke Dashboard -->
                                <a href="{{ route('dashboard') }}"><i class="icon-Profile"></i></a>
                            @else
                                <!-- Jika user bukan ADMIN, munculkan ikon profil dengan dropdown logout -->
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-Profile"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form action="{{ url('logout') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @else
                            <!-- Jika user belum login, arahkan ke halaman login -->
                            <a href="{{ url('login') }}"><i class="icon-Profile"></i></a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">
        <div class="nav-logo"><a href="{{ route('home') }}"><img src="{{ url('frontend/assets/images/logo-2.png') }}" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
    </nav>
</div><!-- End Mobile Menu -->
