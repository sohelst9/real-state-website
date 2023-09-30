@extends('layout.backend.app')
@section('backend_content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">All role</h5>
                        {{-- <small class="text-muted float-end"><a href="{{ route('admin.role.create') }}"
                                class="btn btn-primary btn-sm">Add
                                Role</a></small> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Name</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr class="text-center">
                                            <td>{{ ($roles->currentpage() - 1) * $roles->perpage() + $loop->index + 1 }}</td>
                                            <td>{{ $role->name }}</td>
                                            {{-- <td>
                                                <a href="" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $roles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
