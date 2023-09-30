@extends('layout.frontend.app')
@section('frontend_content')
    @include('frontend.page.modal.call')
    @include('frontend.page.modal.email')
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Details Property</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li class="active">{{ $property->p_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--Page Banner Section end-->

    <!--New property section start-->
    <div
        class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 order-1 order-lg-2 mb-sm-50 mb-xs-50">
                    <div class="row">

                        <!--Property start-->
                        <div class="single-property col-12 mb-50">
                            <div class="property-inner">

                                <div class="head">
                                    <div class="left">
                                        <h1 class="title">{{ $property->p_title }}</h1>
                                        <span class="location"><img
                                                src="{{ asset('frontend/assets/images/icons/marker.png') }}"
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

                                <div class="image mb-30">
                                    <div class="single-property-gallery">
                                        @foreach ($property->GalleryImage as $gallery)
                                            <div class="item"><img
                                                    src="{{ asset('Uploads/Property/GalleryImage/' . $gallery->name) }}"
                                                    alt="" height="470"></div>
                                        @endforeach

                                    </div>
                                    <div class="single-property-thumb">
                                        @foreach ($property->GalleryImage as $gallery)
                                            <div class="item"><img
                                                    src="{{ asset('Uploads/Property/GalleryImage/' . $gallery->name) }}"
                                                    alt="" height="156"></div>
                                        @endforeach
                                    </div>
                                </div>

                                <h3>Social Link</h3>
                                <div class="footer-social mb-5">
                                    <a href="{{ $property->facebook ?? "#" }}" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="{{ $property->twitter ?? "#" }}" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="{{ $setting->linkedin ?? "#" }}" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                    <a href="{{ $setting->instagram ?? "#" }}" class="google"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="{{ $setting->youtube ?? "#" }}" class="pinterest"><i class="fa-brands fa-youtube"></i></a>
                                </div>

                                <div class="content">
                                   

                                    <h3 class="mt-4">Description</h3>

                                    {!! $property->p_description !!}

                                    <div class="row mt-30 mb-30">

                                        <div class="col-md-12 col-12 mb-xs-30">
                                            <h3>Condition</h3>
                                            <ul class="feature-list">
                                                <li>
                                                    <div class="image"><img
                                                            src="{{ asset('frontend/assets/images/icons/area.png') }}"
                                                            alt=""></div>Area {{ $property->p_area }} sqft
                                                </li>
                                                <li>
                                                    <div class="image"><img
                                                            src="{{ asset('frontend/assets/images/icons/bed.png') }}"
                                                            alt=""></div>Bedroom {{ $property->p_bedroom }}
                                                </li>
                                                <li>
                                                    <div class="image"><img
                                                            src="{{ asset('frontend/assets/images/icons/bath.png') }}"
                                                            alt=""></div>Bathroom {{ $property->p_bathroom }}
                                                </li>

                                            </ul>
                                        </div>



                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <h3>Location</h3>
                                            <div class="">
                                                {!! $property->p_map !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Property end-->

                    </div>
                </div>

                <div class="col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15">


                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Agent Contact</span><span class="shape"></span>
                        </h4>

                        <!--Sidebar Agent Contact start-->
                        <div class="agent_contact">
                            <img src="{{ asset('frontend/assets/logo/logo.jpeg') }}" width="100px" alt="">
                            <a href="{{ route('index') }}">aponthikana.com</a>
                            <div class="contact_button">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-phone-volume"></i> Call
                                </button>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#emailModal">
                                    <i class="fa-solid fa-envelope"></i> Email
                                </button>

                            </div>
                        </div>
                        <!--Sidebar Agent Contact end-->

                    </div>
                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Feature Property</span><span class="shape"></span>
                        </h4>

                        <!--Sidebar Property start-->
                        <div class="sidebar-property-list">
                            @foreach ($f_properties as $f_propertie)
                                <div class="sidebar-property">
                                    <div class="image">
                                        <span class="type">
                                            @if ($f_propertie->p_selling_type == 1)
                                                For Rent
                                            @else
                                                For Sale
                                            @endif
                                        </span>
                                        <a href="{{ route('page.details.property', $f_propertie->id) }}"><img
                                                src="{{ asset('Uploads/Property/Thumbnail/' . $f_propertie->p_thumbnail_image) }}"
                                                alt=""></a>
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a
                                                href="{{ route('page.details.property', $f_propertie->id) }}">{{ $f_propertie->p_title }}</a>
                                        </h5>
                                        <span class="location"><img
                                                src="{{ asset('frontend/assets/images/icons/marker.png') }}"
                                                alt="">{{ $f_propertie->p_address }}</span>
                                        <span class="price">BDT {{ $f_propertie->p_price }}</span>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <!--Sidebar Property end-->

                    </div>

                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Top Agents</span><span class="shape"></span></h4>

                        <!--Sidebar Agents start-->
                        <div class="sidebar-agent-list">
                            @foreach ($agents as $agent)
                                <div class="sidebar-agent">
                                    <div class="image">
                                        

                                        @if ($agent->image)
                                        <a><img src="{{ asset('Uploads/Users/' . $agent->image) }}"
                                            alt="{{ $agent->fname }} {{ $agent->lname }}"></a>
                                        @else
                                            <a><img class="agent_image"
                                                    src="{{ asset('frontend/assets/logo/dumy_agent.jpeg') }}"></a>
                                        @endif
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a>{{ $agent->fname }} {{ $agent->lname }}</a></h5>
                                        <a class="phone">{{ $agent->phone }}</a>
                                        <a class="email">{{ $agent->email }}</a>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--Sidebar Agents end-->

                    </div>

                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Popular Tags</span><span class="shape"></span>
                        </h4>

                        <!--Sidebar Tags start-->
                        <div class="sidebar-tags">
                            <a href="#">Houses</a>
                            <a href="#">Real Home</a>
                            <a href="#">Baths</a>
                            <a href="#">Beds</a>
                            <a href="#">Garages</a>
                            <a href="#">Family</a>
                            <a href="#">Real Estates</a>
                            <a href="#">Properties</a>
                            <a href="#">Location</a>
                            <a href="#">Price</a>
                        </div>
                        <!--Sidebar Tags end-->

                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--New property section end-->
@endsection
