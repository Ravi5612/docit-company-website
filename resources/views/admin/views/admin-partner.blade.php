@extends('admin.layout.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>Partner </h5>
                    <div class="list-btn">
                        <ul class="filter-list">

                            <li>
                                <a class="btn btn-primary" href="javascript:void(0);" data-bs-toggle="modal"
                                    data-bs-target="#add_category"><i class="fa fa-plus-circle me-2"
                                        aria-hidden="true"></i>Add Partner</a>
                            </li>

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
                                            <th>Partner </th>
                                            <th>Status</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($partners as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="" class="product-list-item-img"><span>{{ $item->name }}</span></a>
                                                </td>
                                                <td> <span
                                                        class="badge bg-{{ $item->status == 'active' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($item->status) }}
                                                    </span></td>
                                                <td class="d-flex align-items-center">
                                                    @can('view course')
                                                        <a class="btn-action-icon me-2" href="javascript:void(0);"
                                                            data-bs-toggle="modal" data-bs-target="#view_item{{ $item->id }}">
                                                            <i class="fe fe-eye"></i>
                                                        </a>
                                                    @endcan
                                                    @can('edit course')
                                                        <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                            data-bs-toggle="modal" data-bs-target="#edit_category{{ $item->id }}"><i
                                                                class="fe fe-edit"></i></a>
                                                    @endcan
                                                    @can('delete course')
                                                        <form action="{{ route('admin-partner.destroy', $item->id) }}" method="POST"
                                                            class="d-inline delete-form">
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
                                                <td>No partner found yet.</td>
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
                        <h4 class="mb-0">Add Partner</h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('admin-partner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <label>Partner Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter  Name" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Partner Link <span class="text-danger">*</span></label>
                                <input type="url" name="link" class="form-control" placeholder="Enter  URL" required>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label> Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" required>
                                <span class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB (370x420)</span>
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

    @foreach($partners as $item)
        <div class="modal custom-modal fade" id="view_item{{ $item->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">View Partners</h4>
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
                                <th>Link :</th>
                                  <td class="tableData">
                                    <div class="scroll-box">
                                        {{ $item->link }}
                                    </div>
                                </td>
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
                                <th> Image :</th>
                                <td>
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" width="120">
                                    @endif
                                </td>

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
        <div class="modal custom-modal fade" id="edit_category{{ $item->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">Edit Partners</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <form action="{{ route('admin-partner.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="row">

                                <div class="col-lg-6">
                                    <label> Name *</label>
                                    <input type="text" name="name" class="form-control" value="{{ $item->name }}">
                                </div>
                                <div class="col-lg-6">
                                    <label> Link *</label>
                                    <input type="url" name="link" class="form-control" value="{{ $item->link }}">
                                </div>

                                <div class="col-lg-6">
                                    <label> Image</label>
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


        $(document).ready(function () {

            $('.delete-btn').click(function (e) {
                e.preventDefault();

                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Delete Partner?',
                    text: "This Partner will be permanently deleted!",
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
                text: '{{ session("success") }}',
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cells = document.getElementsByClassName("tableData");

            for (let i = 0; i < cells.length; i++) {
                cells[i].style.wordBreak = "break-word";
                cells[i].style.whiteSpace = "normal";
            }
        });
    </script>
@endpush