@extends('layout.backend.app')
@section('backend_content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Newsletters</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($newsletters as $key => $newsletter)
                                        <tr class="text-center">
                                            <td>{{ ($newsletters->currentpage() - 1) * $newsletters->perpage() + $loop->index + 1 }}</td>
                                            <td><a href="mailto:{{ $newsletter->email }}">{{ $newsletter->email }}</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $newsletters->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
