@extends('layout.frontend.app')
@section('frontend_content')
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">About us</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">About us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->



    <!--Services section start-->
    <div
        class="service-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">

            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>About Us</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

            <div class="row row-30 align-items-center">
                <div class="row row-20">
                    <p class="about_us__describson__body__text">
                        {!! $about->page_content ?? '' !!}
    
                    </p>
                 

                </div>
            </div>

        </div>
    </div>
    <!--Services section end-->
@endsection
