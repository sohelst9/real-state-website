@extends('layout.frontend.app')
@section('frontend_content')
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Show Property</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="active">Show Property</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->
    <!--Add Properties section start-->
    <div
        class="add-properties-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <table class="table table-bordered property_show_table">
                    <tr>
                        <th>Title</th>
                        <td>{{ $property->p_title }}</td>
                    </tr>

                    <tr>
                        <th>Selling Type</th>
                        <td>
                            @if ($property->p_selling_type == 1)
                                Rent
                            @else
                                Sale
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Property Type</th>
                        <td>
                            {{ $property->PropertyType?->name }}
                        </td>
                    </tr>

                    <tr>
                        <th>Property Feature</th>
                        <td>
                            @if ($property->p_feature == 0)
                                No
                            @else
                                Yes
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Property Price</th>
                        <td>
                            {{ $property->p_price }}
                        </td>
                    </tr>

                    <tr>
                        <th>Property Area</th>
                        <td>
                            {{ $property->p_area }}
                        </td>
                    </tr>

                    <tr>
                        <th>Property Floor</th>
                        <td>
                            {{ $property->p_floor }}
                        </td>
                    </tr>

                    <tr>
                        <th>Property Address</th>
                        <td>
                            {{ $property->p_address }}
                        </td>
                    </tr>

                    <tr>
                        <th>Property City</th>
                        <td>
                            {{ $property->p_city }}
                        </td>
                    </tr>

                    <tr>
                        <th>Property Bedroom</th>
                        <td>
                            {{ $property->p_bedroom }}
                        </td>
                    </tr>

                    <tr>
                        <th>Property Bathroom</th>
                        <td>
                            {{ $property->p_bathroom }}
                        </td>
                    </tr>

                    <tr>
                        <th>Property Gallery Image</th>
                        <td>
                            @if ($property->GalleryImage)
                                @foreach ($property->GalleryImage as $gallery_image)
                                    <img src="{{ asset('Uploads/Property/GalleryImage/' . $gallery_image->name) }}"
                                        width="150" height="150" alt="">
                                @endforeach
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Property Legal Document</th>
                        <td>
                            @if ($property->p_legal_document)
                                <a href="{{ asset('Uploads/Property/LegalProperty/' . $property->p_legal_document) }}"
                                    target="blank">{{ $property->p_legal_document }}</a> <br>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Property Description</th>
                        <td>
                            {!! $property->p_description !!}
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
    <!--Add Properties section end-->
@endsection

@section('forntend_script')
@endsection
