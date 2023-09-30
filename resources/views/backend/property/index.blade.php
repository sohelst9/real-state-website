@extends('layout.backend.app')
@section('backend_content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">All Property</h5>
                        @if($approval == 0)
                        <form action="{{ route('admin.property') }}" method="GET">
                            <div class="input-group">
                                <div class="form-outline">
                                    <input type="search" name="search" placeholder="Enter Property Name."
                                        class="form-control" id="search" />
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                        @else
                        <form action="{{ route('admin.property.approved') }}" method="GET">
                            <div class="input-group">
                                <div class="form-outline">
                                    <input type="search" name="search" placeholder="Enter Property Name."
                                        class="form-control" id="search" />
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead class="bg-dark text-light">
                                    <tr class="text-center" style="width:120px">
                                        <th>#</th>
                                        <th>Action</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Thumbnail</th>
                                        <th>Added</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($properties as $key => $property)
                                        <tr class="text-center">
                                            <td>{{ ($properties->currentpage() - 1) * $properties->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fa-sharp fa-solid fa-bars"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">

                                                        @if (auth()->guard('admin')->user()->Role?->slug == 'legal')
                                                            <li>
                                                                @if ($property->status == 1)
                                                                    <a class="dropdown-item text-primary">Legal Check
                                                                        Approved</a>
                                                                @else
                                                                    <a href="{{ route('admin.property.status', $property->id) }}"
                                                                        class="dropdown-item text-danger">Legal Check
                                                                        Pending</a>
                                                                @endif
                                                            </li>
                                                        @endif

                                                        @if (auth()->guard('admin')->user()->Role?->slug == 'management')
                                                            <li>
                                                                @if ($property->status == 1)
                                                                    <a class="dropdown-item text-primary">Legal Check
                                                                        Approved</a>
                                                                @else
                                                                    <a href="{{ route('admin.property.status', $property->id) }}"
                                                                        class="dropdown-item text-danger">Legal Check
                                                                        Pending</a>
                                                                @endif
                                                            </li>

                                                            <li>
                                                                @if ($property->management_check == 1)
                                                                    <a class="dropdown-item text-primary">Management Check
                                                                        Approved</a>
                                                                @else
                                                                    <a href="{{ route('admin.property.management_check', $property->id) }}"
                                                                        class="dropdown-item text-danger">Management Check
                                                                        Pending</a>
                                                                @endif
                                                            </li>
                                                        @endif

                                                        @if (auth()->guard('admin')->user()->Role?->slug == 'admin')
                                                            <li>
                                                                @if ($property->status == 1)
                                                                    <a class="dropdown-item text-primary">Legal Check
                                                                        Approved</a>
                                                                @else
                                                                    <a href="{{ route('admin.property.status', $property->id) }}"
                                                                        class="dropdown-item text-danger">Legal Check
                                                                        Pending</a>
                                                                @endif
                                                            </li>

                                                            <li>
                                                                @if ($property->management_check == 1)
                                                                    <a class="dropdown-item text-primary">Management Check
                                                                        Approved</a>
                                                                @else
                                                                    <a href="{{ route('admin.property.management_check', $property->id) }}"
                                                                        class="dropdown-item text-danger">Management Check
                                                                        Pending</a>
                                                                @endif
                                                            </li>

                                                            <li>
                                                                @if ($property->status == 1 && $property->management_check == 1)
                                                                    @if ($property->admin_check == 1)
                                                                        <a class="dropdown-item text-primary">Admin Check
                                                                            Approved</a>
                                                                    @else
                                                                        <a href="{{ route('admin.property.admin_check', $property->id) }}"
                                                                            class="dropdown-item text-danger">Admin Check
                                                                            Pending</a>
                                                                    @endif
                                                                @endif
                                                                </a>
                                                            </li>
                                                        @endif

                                                        <li>
                                                            <a href="{{ route('admin.property.view', $property->id) }}"
                                                                class="dropdown-item text-info">View</a>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('admin.property.edit', $property->id) }}"
                                                                class="dropdown-item text-primary">Edit</a>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#" name="{{ route('admin.property.delete', $property->id) }}"
                                                                class="dropdown-item text-danger delete-confirm">Delete</a>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>

                                            <td>{{ $property->p_title }}</td>
                                            <td>{{ $property->p_price }}</td>
                                            <td>{{ $property->p_address }}</td>
                                            <td>{{ $property->City?->name }}</td>
                                            <td>
                                                @if ($property->p_thumbnail_image)
                                                    <img src="{{ asset('Uploads/Property/Thumbnail/' . $property->p_thumbnail_image) }}"
                                                        alt="" width="140">
                                                @endif
                                            </td>
                                            <td>{{ $property->User?->fname }} {{ $property->User?->lname }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $properties->links() }}
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