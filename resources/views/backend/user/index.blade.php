@extends('layout.backend.app')
@section('backend_content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">All User</h5>
                        <form action="{{ route('admin.users') }}" method="GET">
                            <div class="input-group">
                                <div class="form-outline">
                                    <input type="search" name="search" placeholder="Enter Name."
                                        class="form-control" id="search" />
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead class="bg-dark text-light">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>UserName</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Thumbnail</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr class="text-center">
                                            <td>{{ ($users->currentpage() - 1) * $users->perpage() + $loop->index + 1 }}</td>
                                            <td>{{ $user->fname }} {{ $user->lname }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>
                                                @if($user->image)
                                                <img class="admin_user_image" src="{{ asset('Uploads/Users/'.$user->image) }}" alt="">
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->type == 1)
                                                <a class="btn btn-sm btn-primary text-light">User</a>
                                                @else
                                                <a class="btn btn-sm btn-info">Agent</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" name="{{ route('admin.user.delete', $user->id) }}" class="btn btn-danger btn-sm delete-confirm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('backend_script')
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