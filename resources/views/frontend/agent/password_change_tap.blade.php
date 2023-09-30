@extends('layout.frontend.app')
@section('frontend_content')
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Password Change</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="active">Password Change</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->
    <!--change Password Section start-->
    <div
        class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row row-25">


                @include('frontend.agent.inc.sideber_das')

                <div class="col-lg-8 col-12">
                    <div id="password-tab" class="tab-pane">
                        <form action="{{ route('agent.password.update') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-30">
                                    <h3 class="mb-0">Change Password</h3>
                                </div>

                                <div class="col-12 mb-30">
                                    <label for="OldPassword">Old Password</label>
                                    <input type="password" name="OldPassword" id="old_password">
                                    <input type="checkbox" class="Password_checkbox" id="old_pass">Show Password
                                    @error('OldPassword')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-12 mb-30">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" id="new_password">
                                    <input type="checkbox" class="Password_checkbox" id="new_pass">Show Password
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <br>
                                    <span class="text-warning fst-italic">Note: Password Must be one uppercase letter, one lowercase letter, one special character, one number, min 8 character & max 10 character</span>
                                </div>

                                <div class="col-12 mb-30">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="confirm_password">
                                    <input type="checkbox" class="Password_checkbox" id="c_pass">Show
                                    Password
                                    @error('confirm_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="col-12 mb-30"><button class="btn">Save Change</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--change Password Section end-->
@endsection

@section('forntend_script')
    <script>
        $(document).ready(function() {
            //---old pass
            $('#old_pass').on('click', function() {
                var passInput = $("#old_password");
                if (passInput.attr('type') === 'password') {
                    passInput.attr('type', 'text');
                } else {
                    passInput.attr('type', 'password');
                }
            });

            //---new pass
            $('#new_pass').on('click', function() {
                var passInput = $("#new_password");
                if (passInput.attr('type') === 'password') {
                    passInput.attr('type', 'text');
                } else {
                    passInput.attr('type', 'password');
                }
            });

            //---confirm pass
            $('#c_pass').on('click', function() {
                var passInput = $("#confirm_password");
                if (passInput.attr('type') === 'password') {
                    passInput.attr('type', 'text');
                } else {
                    passInput.attr('type', 'password');
                }
            });

            
        });
    </script>
@endsection
