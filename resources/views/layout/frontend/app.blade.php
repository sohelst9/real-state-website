
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="canonical" href="{{ route('index') }}">
    <meta property="og:site_name" content="Apon Thikana">
    <meta property="og:title" content="Apon Thikana">
    <meta property="og:description" content="">
    <meta property="og:url" content="{{ route('index') }}">
    <meta property="og:type" content="article">
    <meta name="twitter:title" content="Apon Thikana">
    <meta name="twitter:description" content="">

    <title>Apon Thikana - Solve Your Problems</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link href="{{ asset('frontend/assets/logo/logo.jpeg') }}" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/iconfont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/helper.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
     <!-----toster alert ----->
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Modernizr JS -->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>

    <div id="main-wrapper">

        <!--Header section start-->
        @include('layout.partial.frontend.header')
        <!--Header section end-->

        <!---main----->
        @yield('frontend_content')
        <!---main end----->

        <!--Footer section start-->
        <footer class="footer-section section" style="background-image: url(assets/images/bg/footer-bg.jpg)">

            <!--Footer Top start-->
            <div
                class="footer-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
                <div class="container">
                    <div class="row row-25">

                        <!--Footer Widget start-->
                        <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                            <img src="{{ asset('Uploads/SiteLogo/'.$setting->site_logo) }}" alt="">
                            <p>{{ $setting->footer_content }}</p>
                            <div class="footer-social">
                                <a href="{{ $setting->facebook }}" class="facebook" target="blank"><i class="fa fa-facebook"></i></a>
                                <a href="{{ $setting->twitter }}" class="twitter" target="blank"><i class="fa fa-twitter"></i></a>
                                <a href="{{ $setting->linkedin }}" class="linkedin" target="blank"><i class="fa fa-linkedin"></i></a>
                                <a href="{{ $setting->instagram }}" class="google" target="blank"><i class="fa-brands fa-instagram"></i></a>
                                <a href="{{ $setting->youtube }}" class="pinterest" target="blank"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                        <!--Footer Widget end-->

                        <!--Footer Widget start-->
                        <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                            <h4 class="title"><span class="text">Contact us</span><span class="shape"></span></h4>
                            <ul>
                                <li><i class="fa fa-map-o"></i><span>{{ $setting->address }}</span>
                                </li>
                                <li><i class="fa fa-phone"></i><span><a href="#">{{ $setting->phone }}</a></span></li>
                                <li><i class="fa fa-envelope-o"></i><span><a href="#">{{ $setting->email }}</a></span></li>
                            </ul>
                        </div>
                        <!--Footer Widget end-->

                        <!--Footer Widget start-->
                        <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                            <h4 class="title"><span class="text">Useful links</span><span class="shape"></span></h4>
                            <ul>
                                <li><a href="{{ route('page.property') }}">Property</a></li>
                                <li><a href="{{ route('page.agent') }}">Agent</a></li>
                                <li><a href="{{ route('page.about') }}">About Us</a></li>
                                <li><a href="{{ route('page.contact') }}">Contact Us</a></li>
                                {{-- <li><a href="#">Privacy Policy</a></li> --}}
                            </ul>
                        </div>
                        <!--Footer Widget end-->

                        <!--Footer Widget start-->
                        <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                            <h4 class="title"><span class="text">Newsletter</span><span class="shape"></span></h4>

                            <p>Subscribe our newsletter and get all latest news about our latest properties, promotions,
                                offers and discount</p>

                            <form id="" class="mc-form footer-newsletter" action="{{ route('newsletter') }}" method="post">
                                @csrf
                                <input type="email" name="email" placeholder="Email Here.." autocomplete="hide" />
                               
                                <button type="submit" id=""><i class="fa fa-paper-plane-o"></i></button>
                                 @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->

                        </div>
                        <!--Footer Widget end-->

                    </div>
                </div>
            </div>
            <!--Footer Top end-->

            <!--Footer bottom start-->
            <div class="footer-bottom section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright text-center">
                                <p>Copyright &copy;2023 <a href="{{ route('index') }}">Apon Thikana</a>. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer bottom end-->

        </footer>
        <!--Footer section end-->
    </div>

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- All jquery file included here -->
    <script src="{{ asset('frontend/assets/tinymce/tinymce.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script
        src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-1.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/map-place.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    

    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    <script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    </script>

    @yield('forntend_script')

</body>

</html>