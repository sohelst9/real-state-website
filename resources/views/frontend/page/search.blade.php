@extends('layout.frontend.app')
@section('frontend_content')
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Search Result</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li class="active">Search Result</li>
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

                <!--Property start-->
                @forelse ($properties as $property)
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
                @empty
                    <h3 class="text-center text-danger">Search Result Not Found</h3>
                @endforelse

                <!--Property end-->


            </div>

        </div>
    </div>
    <!--New property section end-->
@endsection
