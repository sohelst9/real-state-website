@extends('layout.backend.app')
@section('backend_content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Show Details Property</h5>
                        
                    </div>
                    <div class="card-body">
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
                                        <img src="{{ asset('Uploads/Property/GalleryImage/'.$gallery_image->name) }}" width="150" height="150" alt="">
                                    @endforeach
                                    @endif
                                </td>
                            </tr>
            
                            <tr>
                                <th>Property Legal Document</th>
                                <td>
                                    @if ($property->p_legal_document)
                                    <a href="{{ asset('Uploads/Property/LegalProperty/' . $property->p_legal_document) }}"
                                        target="blank">{{ $property->p_legal_document }}</a>
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
        </div>
    </div>
@endsection
