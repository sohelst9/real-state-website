<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/iconfont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/helper.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <!-----toster alert ----->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Modernizr JS -->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!---main----->
    <div class="page-banner-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="col-md-6 m-auto">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <h1 class="page-banner-title">Change Your Password</h1>
                    {{-- <h4 class="verify-title">Forgot your account’s password? Enter your email address and Get Verification Code</h4> --}}
                    <div class="row">
                        <div class="col-md-6 m-auto">
                            <form action="{{ route('new.password.store') }}" method="POST">
                                <input type="hidden" name="otp" value="{{ $otp }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="new_password" class="text-light">New Password :</label>
                                    <input type="password" name="password" class="bg-light" id="NewPassword">
                                    <input type="checkbox" class="Password_checkbox" id="new_pass"><span class="text-light">Show Password</span> <br>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <span class="text-info fst-italic">Note: Password Must be one uppercase letter, one lowercase letter, one special character, one number, min 8 character & max 10 character</span>
                                    
                                </div>

                                <div class="mb-3">
                                    <label for="c_password" class="text-light">Confirm Password :</label>
                                    <input type="password" name="password_confirmation" class="bg-light" id="CPassword">
                                    <input type="checkbox" class="Password_checkbox" id="c_pass"><span class="text-light">Show Password</span> 
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="col-12 mb-30 text-center"><button class="btn">Send</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- All jquery file included here -->
    <script src="{{ asset('frontend/assets/tinymce/tinymce.min.js') }}"></script>
    <script
        src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM">
    </script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-1.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/map-place.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script>
        //--new password show hide---
        $('#new_pass').on('click', function() {
            var passInput = $("#NewPassword");
            if (passInput.attr('type') === 'password') {
                passInput.attr('type', 'text');
            } else {
                passInput.attr('type', 'password');
            }
        });

        //--confirm password show hide---
        $('#c_pass').on('click', function() {
            var passInput = $("#CPassword");
            if (passInput.attr('type') === 'password') {
                passInput.attr('type', 'text');
            } else {
                passInput.attr('type', 'password');
            }
        });

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

    @yield('forntend_script')

</body>

</html>
