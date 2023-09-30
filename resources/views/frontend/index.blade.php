@extends('layout.frontend.app')
@section('frontend_content')
    <!--slider section start-->
    <div class="hero-section section position-relative">
        <!--Hero Item start-->
        <div class="hero-item">
            <!--Search Section start-->
            <div class="search-section section pt-0 pt-sm-60 pt-xs-50 ">
                <div class="container">

                 

                    <div class="row">
                        <div class="col-12">

                            <!--Hero Search start-->
                            <div class="hero-search">

                                <form action="{{ route('front.search') }}">

                                    <div>
                                        <h4>Status</h4>
                                        <select class="nice-select" name="status">
                                            <option value="1">For Rent</option>
                                            <option value="2">For Sale</option>
                                        </select>
                                    </div>

                                    <div>
                                        <h4>Type</h4>
                                        <select class="nice-select" name="type">
                                            <option value="">Select</option>
                                            @foreach ($property_types as $property_type)
                                            <option value="{{ $property_type->id }}">{{ $property_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <h4>City</h4>
                                        <select class="nice-select" name="city">
                                            <option value="">Select</option>
                                            @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                   
                                    <div>
                                        <h4>Search</h4>
                                        <div class="submit">
                                            <button type="submit">Find</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <!--Hero Search end-->

                        </div>
                    </div>

                </div>
            </div>
            <!--Search Section end-->
        </div>
        <!--Hero Item end-->

    </div>
    <!--slider section end-->



    <!--New property section start-->
    <div
        class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
        <div class="container">

            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Newly Added Property</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

            <div class="row">

                <!--Property start-->
                @foreach ($properties as $property)
                    <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                        <div class="property-inner">
                            <div class="image">
                                <a href="{{ route('page.details.property', $property->id) }}"><img
                                        src="{{ asset('Uploads/Property/Thumbnail/' . $property->p_thumbnail_image) }}"
                                        alt=""></a>
                                <ul class="property-feature">
                                    <li>
                                        <span class="area"><img src="{{ asset('frontend/assets/images/icons/area.png') }}"
                                                alt="">{{ $property->p_area }}
                                            SqFt</span>
                                    </li>
                                    <li>
                                    <span class="bed"><img src="{{ asset('frontend/assets/images/icons/bed.png') }}"
                                            alt="">{{ $property->p_bedroom }}</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="{{ asset('frontend/assets/images/icons/bath.png') }}"
                                            alt="">{{ $property->p_bathroom }}</span>
                                </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="{{ route('page.details.property', $property->id) }}">{{ $property->p_title }}</a></h3>
                                    <span class="location"><img src="{{ asset('frontend/assets/images/icons/marker.png') }}"
                                            alt="">{{ $property->p_address }}</span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price">BDT {{ $property->p_price }}</span>
                                        <span class="type">
                                            @if ($property->p_selling_type == 1)
                                                For Rent
                                            @else
                                                For Sale
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--Property end-->
            </div>

        </div>
    </div>
    <!--New property section end-->

    <!--Welcome apon thikana-->
    
    <!--Welcome apon thikana end-->

    <!--Download apps section start-->
    <div class="download-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!--Download Content start-->
                    <div class="download-content">
                        <h1>Download <span>AponThikana</span> App <br>And Get Notification For New Properties</h1>
                        <div class="buttons mb-5">
                            <a href="#">
                                <i class="fa fa-apple"></i>
                                <span class="text">
                                    <span>Available on the</span>
                                    Apple Store
                                </span>
                            </a>
                            <a href="#">
                                <i class="fa fa-android"></i>
                                <span class="text">
                                    <span>Get it on</span>
                                    Google Play
                                </span>
                            </a>
                            <a href="#">
                                <i class="fa fa-windows"></i>
                                <span class="text">
                                    <span>Download form</span>
                                    Windows Store
                                </span>
                            </a>
                        </div>
                        {{-- <div class="image"><img src="{{ asset('frontend/assets/images/others/app.png') }}" alt=""> --}}
                        </div>
                    </div>
                    <!--Download Content end-->

                </div>
            </div>
        </div>
    </div>
    <!--Download apps section end-->

    <!--Services section start-->
   
    <!--Services section end-->

    <!--Feature property section start-->
    <div class="property-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">

            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Feature Property</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

            <div class="row">

                <!--Property Slider start-->
                <div class="property-carousel section slider-space-30">

                    <!--Property start-->
                    @foreach ($f_properties as $f_property)
                        <div class="property-item col">
                            <div class="property-inner">
                                <div class="image">
                                    <a href="{{ route('page.details.property', $f_property->id) }}"><img src="{{ asset('Uploads/Property/Thumbnail/' . $f_property->p_thumbnail_image) }}"
                                            alt=""></a>
                                    <ul class="property-feature">
                                        <li>
                                            <span class="area"><img src="{{ asset('frontend/assets/images/icons/area.png') }}"
                                                    alt="">{{ $property->p_area }}
                                                SqFt</span>
                                        </li>
                                        <li>
                                        <span class="bed"><img src="{{ asset('frontend/assets/images/icons/bed.png') }}"
                                                alt="">{{ $property->p_bedroom }}</span>
                                    </li>
                                    <li>
                                        <span class="bath"><img src="{{ asset('frontend/assets/images/icons/bath.png') }}"
                                                alt="">{{ $property->p_bathroom }}</span>
                                    </li>
                                        
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="title"><a href="{{ route('page.details.property', $f_property->id) }}">{{ $f_property->p_title }}</a>
                                        </h3>
                                        <span class="location"><img src="{{ asset('frontend/assets/images/icons/marker.png') }}"
                                                alt="">{{ $f_property->p_address }}</span>
                                    </div>
                                    <div class="right">
                                        <div class="type-wrap">
                                            <span class="price">BDT {{ $f_property->p_price }}</span>
                                            <span class="type">
                                                @if ($f_property->p_selling_type == 1)
                                                For Rent
                                            @else
                                                For Sale
                                            @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!--Property end-->
                </div>
                <!--Property Slider end-->

            </div>

        </div>
    </div>
    <!--Feature property section end-->

    <!--CTA Section start-->
    <div class="cta-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50"
        style="background-image: url(assets/images/bg/cta-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!--CTA start-->
                    <div class="cta-content text-center">
                        <h1>Want to <span>Buy</span> New Property or <span>Sell</span> One <br> Do it in Seconds
                            With <span>AponThikana</span></h1>
                        <div class="buttons">
                            <a href="{{ route('page.property') }}">Browse Properties</a>
                        </div>
                    </div>
                    <!--CTA end-->

                </div>
            </div>
        </div>
    </div>
    <!--CTA Section end-->

    <!--Agent Section start-->
    <div
        class="agent-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">

            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Our Agents</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

            <div class="row">
                <div class="agent-carousel section slider-space-30">

                    <!--Agent satrt-->
                    @foreach ($agents as $agent)
                    <div class="col">
                        <div class="agent">
                            <div class="image">
                                <a class="img">
                                    @if ($agent->image)
                                    <img class="agent_image" src="{{ asset('Uploads/Users/'.$agent->image) }}"
                                    alt="" height="250">
                                    @else
                                    <img class="agent_image" src="{{ asset('frontend/assets/logo/dumy_agent.jpeg') }}"
                                        alt="" height="250">
                                    @endif
                                    </a>
                                {{-- <div class="social">
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                </div> --}}
                            </div>
                            <div class="content">
                                <h4 class="title"><a>{{ $agent->fname }} {{ $agent->lname }}</a></h4>
                                <a class="phone">{{ $agent->phone }}</a>
                                <a class="email">{{ $agent->email }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--Agent end-->

                </div>
            </div>
        </div>
    </div>
    <!--Agent Section end-->
@endsection
