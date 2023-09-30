{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layout.frontend.app')
@section('frontend_content')
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Sign Up</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li class="active">Sign Up </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->
    <!--Login & Register Section start-->
    <div
        class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50 user_auth_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 ms-auto me-auto">

                    <ul class="login-register-tab-list nav">
                        <li><a>Sign Up</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="login-tab" class="tab-pane show active">
                            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="col-12 mb-30">
                                            <label for="fname">First Name</label>
                                            <input type="text" name="fname" placeholder="First Name">
                                            @error('fname')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

    
                                        <div class="col-12 mb-30">
                                            <label for="email">Email <span class="text-danger">(Valid Email Address)</span></label>
                                            <input type="email" name="email" placeholder="Email Address">
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
    
                                        <div class="col-12 mb-30">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" placeholder="Phone Number">
                                            @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-12 mb-30">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" placeholder="Password" id="registerPassword">
                                            <input type="checkbox" class="Password_checkbox" id="re_pass">Show Password <br>
                                            <span class="text-warning fst-italic">Note: Password Must be one uppercase letter, one lowercase letter, one special character, one number, min 8 character & max 10 character</span>
                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-12 mb-30">
                                            <label for="c_password">Confirm Password</label>
                                            <input type="password" name="password_confirmation" placeholder="Password" id="ConPassword">
                                            <input type="checkbox" class="Password_checkbox" id="c_pass">Show bPassword
                                            @error('c_password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="col-12 mb-30">
                                            <label for="lname">Last Name</label>
                                            <input type="text" name="lname" placeholder="Last Name">
                                            @error('lname')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-12 mb-30">
                                            <label for="type">Account Type</label>
                                            <select name="type" class="">
                                                <option value="">Select Account Type</option>
                                                <option value="1">User</option>
                                                <option value="2">Agent</option>
                                            </select>
                                            @error('type')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
    
                                        <div class="col-12 mb-30">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" placeholder="Your Address">
                                            @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-12 mb-30">
                                            <label for="image">Profile Image</label>
                                            <input type="file" name="image" placeholder="" id="profile_image">
                                            <label for="profile_image" class="file_upload">Upload Your Profile</label>
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>


                                    </div>

                                    <div class="col-12 mb-30 text-center"><button class="btn">Sign Up</button></div>

                                    <div class="col-12 d-flex justify-content-center">
                                        <span>Already Have an Account ?&nbsp; <a class=""
                                                href="{{ route('login') }}">Sign In!</a></span>
                                        {{-- <span><a href="forgot-password.html">Forgot Password ?</a></span> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--Login & Register Section end-->
@endsection

@section('forntend_script')
    <script>
        //---old pass
        $('#re_pass').on('click', function() {
                var passInput = $("#registerPassword");
                if (passInput.attr('type') === 'password') {
                    passInput.attr('type', 'text');
                } else {
                    passInput.attr('type', 'password');
                }
            });

            //---new pass
            $('#c_pass').on('click', function() {
                var passInput = $("#ConPassword");
                if (passInput.attr('type') === 'password') {
                    passInput.attr('type', 'text');
                } else {
                    passInput.attr('type', 'password');
                }
            });
    </script>
@endsection
