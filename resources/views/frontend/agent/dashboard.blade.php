@extends('layout.frontend.app')
@section('frontend_content')
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">My Account</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li class="active">My Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

    <!--dashbaord Section start-->
    <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row row-25">
               
                @include('frontend.agent.inc.sideber_das')
                
                <div class="col-lg-8 col-12">
                        <!--profile tab start-->
                        @include('frontend.agent.inc.profiletab')
                        <!--profile tab end-->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!--dashboard Section end-->
@endsection