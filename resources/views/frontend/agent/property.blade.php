@extends('layout.frontend.app')
@section('frontend_content')
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">My Property</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="active">My Property</li>
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
                    <div id="properties-tab" class="tab-pane">
                        <div class="row">
                            <!--Property start-->
                            <div>
                                <table class="table table-bordered table-hover">
                                    <thead class="bg-success text-light">
                                        <tr>
                                            <th>#</th>
                                            <th style="width:200px">Title</th>
                                            <th>Price</th>
                                            <th style="width:100px">Address</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($properties as $key => $property)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td style="width:200px">{{ $property->p_title }}</td>
                                                <td>{{ $property->p_price }}</td>
                                                <td style="width:100px">{{ $property->p_address }}</td>
                                                <td>
                                                    @if ($property->p_thumbnail_image)
                                                        <img src="{{ asset('Uploads/Property/Thumbnail/' . $property->p_thumbnail_image) }}"
                                                            alt="" width="140">
                                                    @endif
                                                </td>
                                                <td>

                                                    <a href="{{ route('property.show', $property->id) }}"
                                                        class="text-info"><i class="fa-solid fa-eye"></i></a>

                                                    <a href="{{ route('agent.edit.property', $property->id) }}"
                                                        class="text-primary">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>

                                                    <a name="{{ route('agent.delete.property', $property->id) }}"
                                                        class="text-danger delete-confirm">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--Property end-->


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--change Password Section end-->
@endsection

@section('forntend_script')
<script>
    $('.delete-confirm').click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "If you delete this, it will be gone forever !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var link = $(this).attr('name');
                    window.location.href = link;
                }
            })
        });
</script>
@endsection
