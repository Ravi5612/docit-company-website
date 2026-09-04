@extends('admin.layout.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>College States </h5>
                    <div class="list-btn">
                        <ul class="filter-list">

                            @can('create college states')
                                <li>
                                    <a class="btn btn-primary" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#add_category"><i class="fa fa-plus-circle me-2"
                                            aria-hidden="true"></i>Add State</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->





            <!-- Table -->
            <div class="row">
                <div class="col-sm-12">
                    <div class=" card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>State Name</th>
                                            <th>Status</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($collegeStates as $collegeState)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href=""
                                                        class="product-list-item-img"><span>{{ $collegeState->name }}</span></a>
                                                </td>
                                                <td> <span
                                                        class="badge bg-{{ $collegeState->status == 'active' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($collegeState->status) }}
                                                    </span></td>
                                                <td class="d-flex align-items-center">
                                                    @can('view college states')
                                                        <a class="btn-action-icon me-2" href="javascript:void(0);"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view_collegeState{{ $collegeState->id }}">
                                                            <i class="fe fe-eye"></i>
                                                        </a>
                                                    @endcan
                                                    @can('edit college states')
                                                        <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                            data-bs-toggle="modal" data-bs-target="#edit_category"><i
                                                                class="fe fe-edit"></i></a>
                                                    @endcan
                                                    @can('delete college states')
                                                        <form
                                                            action="{{ route('admin-college-states.destroy', $collegeState->id) }}"
                                                            method="POST" class="d-inline delete-form">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="button"
                                                                class="btn-action-icon border-0 bg-transparent delete-btn">
                                                                <i class="fe fe-trash-2"></i>
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td>No College States found yet.</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Table -->

        </div>
    </div>
    <!-- Add blog Modal -->
    <div class="modal custom-modal fade" id="add_category" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div class="form-header modal-header-title text-start mb-0">
                        <h4 class="mb-0">Add State</h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('admin-college-states.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <label>State Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter State Name" required>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug" class="form-control" placeholder="Enter Slug" readonly>
                            </div>



                            <div class="col-lg-6 mb-3">
                                <label>State Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" required>
                                <span class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB (680x560)</span>
                            </div>



                            <div class="col-lg-12 mb-3">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" placeholder="Enter description" rows="4"
                                    required></textarea>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Overview <span class="text-danger">*</span></label>
                                <textarea name="overview" class="form-control" placeholder="Enter overview" rows="4"
                                    required></textarea>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary me-3">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- /Add  Modal -->
    {{-- view modal --}}

    @foreach($collegeStates as $item)
        <div class="modal custom-modal fade" id="view_collegeState{{ $item->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">View College State</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <table class="table table-bordered table-striped mb-0">

                            <tr>
                                <th>Name :</th>
                                <td>{{ $item->name }}</td>
                            </tr>



                            <tr>
                                <th>Status :</th>
                                <td>
                                    <span class="badge bg-{{ $item->status == 'active' ? 'success' : 'danger' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>College State Image :</th>
                                <td>
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" width="120">
                                    @endif
                                </td>


                            </tr>



                            <tr>
                                <th>Description :</th>
                                <td colspan="3">{{ $item->description }}</td>
                            </tr>
                            <tr>
                                <th>Overview :</th>
                                <td colspan="3">{{ $item->overview }}</td>
                            </tr>

                        </table>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>

                </div>
            </div>
        </div>




        <!-- edit Modal -->
        <div class="modal custom-modal fade" id="edit_category" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">Edit College State</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <form action="{{ route('admin-college-states.update', $collegeState->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="row">

                                <div class="col-lg-6">
                                    <label>College State Name *</label>
                                    <input type="text" name="name" class="form-control" value="{{ $item->name }}">
                                </div>

                                <div class="col-lg-6">
                                    <label>Slug *</label>
                                    <input type="text" name="slug" class="form-control" value="{{ $item->slug }}">
                                </div>


                                <div class="col-lg-6">
                                    <label>College State Image</label>
                                    <input type="file" name="image" class="form-control">

                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" width="80" class="mt-2">
                                    @endif
                                </div>

                                <div class="col-lg-6">
                                    <label>Status *</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{ $item->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $item->status == 'inactive' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <label>Description *</label>
                                    <textarea name="description" class="form-control"
                                        rows="4">{{ $item->description }}</textarea>
                                </div>

                                <div class="col-lg-12">
                                    <label>Overview *</label>
                                    <textarea name="overview" class="form-control" rows="4">{{ $item->overview }}</textarea>
                                </div>



                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary me-2">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /Edit  Modal -->
    @endforeach

@endsection
@push('scripts')

    <script>
        document.querySelectorAll('input[name="name"]').forEach(function (input) {
            input.addEventListener('keyup', function () {
                let slug = this.value.toLowerCase()
                    .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');

                this.closest('form').querySelector('input[name="slug"]').value = slug;
            });
        });

        $(document).ready(function () {

            $('.delete-btn').click(function (e) {
                e.preventDefault();

                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Delete Event?',
                    text: "This event will be permanently deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });

            });

        });
    </script>
    @if(session('success'))

        <script>

            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            })

        </script>

    @endif
    @if($errors->any())

        <script>

            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: '{{ $errors->first() }}'
            })

        </script>

    @endif
@endpush