@extends('layout.backend.app')
@section('backend_content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Congratulations
                                    {{ auth()->guard('admin')->user()->name }}! 🎉</h5>
                                <p class="mb-4">
                                    Apon Thikana Dashboard
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-3 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="fw-semibold d-block mb-1">Total Users</span>
                                <a href="{{ route('admin.users') }}">
                                    <h3 class="card-title mb-2">{{ $users }}</h3>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-3 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="fw-semibold d-block mb-1">All Propety</span>
                                <a href="{{ route('admin.property') }}">
                                    <h3 class="card-title mb-2">{{ $property }}</h3>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
