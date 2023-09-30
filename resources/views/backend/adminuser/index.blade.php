@extends('layout.backend.app')
@section('backend_content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">All Administrator</h5>
                        <small class="text-muted float-end"><a href="{{ route('admin.register') }}"
                            class="btn btn-primary btn-sm">Add
                            New</a></small>
                       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead class="bg-dark text-light">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Thumbnail</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $key => $data)
                                        <tr class="text-center">
                                            <td>{{ ($datas->currentpage() - 1) * $datas->perpage() + $loop->index + 1 }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->phone }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>
                                                @if($data->image)
                                                <img class="admin_user_image" src="{{ asset('Uploads/Admin/'.$data->image) }}" alt="">
                                                @endif
                                            </td>
                                            <td>
                                                {{ $data->Role?->name }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.adminuser.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="#" name="{{ route('admin.adminuser.delete', $data->id) }}" class="btn btn-danger btn-sm delete-confirm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $datas->links() }}
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