<header class="header header-sticky">
    <div class="header-bottom menu-center">
        <div class="container">
            <div class="row justify-content-between align-items-center">

                <!--Logo start-->
                <div class="col mt-10 mb-10">
                    <div class="logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('Uploads/SiteLogo/'.$setting->site_logo) }}"
                                alt=""></a>
                    </div>
                </div>
                <!--Logo end-->

                <!--Menu start-->
                <div class="col d-none d-lg-flex me-auto">
                    <nav class="main-menu">
                        <ul>
                            <li class="has-dropdown"><a href="{{ route('index') }}">Home</a></li>
                            <li class="has-dropdown"><a href="{{ route('page.property') }}">Properties</a></li>
                            <li class="has-dropdown"><a href="{{ route('page.agent') }}">agents</a></li>

                            {{-- <li class="has-dropdown"><a href="">News</a></li> --}}
                            <li class="has-dropdown"><a href="{{ route('page.about') }}">About us</a></li>
                            <li class="has-dropdown"><a href="{{ route('page.contact') }}">Contact Us</a></li>

                            @if (auth()->check())
                                               
                            <li><a href="{{ route('dashboard') }}" class=" d-lg-none">Dashboard</a></li>
                            <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class=" d-lg-none">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form></li>
                        @else
                            <li><a href="{{ route('login') }}" class="d-lg-none">Login
                                or Register</a></li>
                        @endif

                        </ul>

                    </nav>
                </div>
                <!--Menu end-->

                <!--User start-->
                <div class="col ">
                    <div class="header-user d-flex align-items-center">
                        @if (auth()->check())
                            @if (auth()->user()->type == 2)
                                <a href="{{ route('agent.add.property') }}" class="primary_btn d-none d-xl-block">Add Property</a>
                            @endif
                            <a class="user-toggle d-none d-lg-block user_account">Dashboard
                                <div class="sub_menu_dashboard">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="primary_btn d-none d-xl-block">Add Property</a>
                            <a href="{{ route('login') }}" class="user-toggle d-none d-lg-block"><span>Login
                                    or Register</span></a>
                        @endif
                    </div>
                </div>
                <!--User end-->
            </div>

            <!--Mobile Menu start-->
            <div class="row">
                <div class="col-12 d-flex d-lg-none">
                    <div class="mobile-menu"></div>
                </div>
            </div>
            <!--Mobile Menu end-->

        </div>
    </div>
</header>
