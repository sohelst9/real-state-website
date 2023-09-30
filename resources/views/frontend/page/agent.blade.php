@extends('layout.frontend.app')
@section('frontend_content')
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Agents</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li class="active">Agents</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

    <!--Agent Section start-->
    <div class="agent-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">

            <div class="row">

                <!--Agent satrt-->
                @forelse ($agents as $agent)
                    <div class="col-lg-3 col-sm-6 col-12 mb-30">
                        <div class="agent">
                            <div class="image">

                                @if ($agent->image)
                                    <a class="img"><img src="{{ asset('Uploads/Users/' . $agent->image) }}" width=""
                                            alt="" height="250"></a>
                                @else
                                <a class="img"><img class="agent_image" src="{{ asset('frontend/assets/logo/dumy_agent.jpeg') }}"
                                    alt="" height="250"></a>
                                @endif
                            </div>
                            <div class="content">
                                <h4 class="title"><a>{{ $agent->fname }} {{ $agent->lname }}</a></h4>
                                <a class="phone">{{ $agent->phone }}</a>
                                <a class="email">{{ $agent->email }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="text-center text-danger">Agent Not Found</h3>
                @endforelse

                <!--Agent end-->

            </div>

            <div class="row mt-20">
                <div class="col">
                    <ul class="page-pagination">

                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!--Agent Section end-->
@endsection
