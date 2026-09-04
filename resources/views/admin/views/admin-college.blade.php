@extends('admin.layout.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>College </h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            @can('create colleges')
                                <li>
                                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#import_excel">
                                        <i class="fa fa-upload me-2"></i> Import Excel
                                    </a>
                                </li>

                                <li>
                                    <a class="btn btn-primary" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#add_category"><i class="fa fa-plus-circle me-2"
                                            aria-hidden="true"></i>Add </a>
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
                                            <th>College Name</th>
                                            <th>Status</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($colleges as $college)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href=""
                                                        class="product-list-item-img"><span>{{ $college->name }}</span></a></td>
                                                <td> <span
                                                        class="badge bg-{{ $college->status == 'active' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($college->status) }}
                                                    </span></td>
                                                <td class="d-flex align-items-center">
                                                    @can('view colleges')
                                                        <a class="btn-action-icon me-2" href="javascript:void(0);"
                                                            data-bs-toggle="modal" data-bs-target="#view_college{{ $college->id }}">
                                                            <i class="fe fe-eye"></i>
                                                        </a>
                                                    @endcan
                                                    @can('edit colleges')
                                                        <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit_category{{ $college->id }}"><i
                                                                class="fe fe-edit"></i></a>
                                                    @endcan
                                                    @can('delete colleges')
                                                        <form action="{{ route('admin-college-states.destroy', $college->id) }}"
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
                                                <td>No College found yet.</td>
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
                <form action="{{ route('colleges.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="row">

                            {{-- STATE --}}
                            <div class="col-lg-6 mb-3">
                                <label>State <span class="text-danger">*</span></label>
                                <select name="state_id" class="form-control" required>
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- NAME --}}
                            <div class="col-lg-6 mb-3">
                                <label>College Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="College name" class="form-control" required>
                            </div>

                            {{-- SLUG --}}
                            <div class="col-lg-6 mb-3">
                                <label>Slug <span class="text-danger">*</span></label>
                                <input type="text" name="slug" placeholder="college-name" class="form-control" readonly>
                            </div>

                            {{-- IMAGE --}}
                            <div class="col-lg-6 mb-3">
                                <label>Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" required>
                            </div>

                            {{-- EMAIL --}}
                            <div class="col-lg-6 mb-3">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" placeholder="admin@gmail.com" class="form-control"
                                    required>
                            </div>

                            {{-- TYPE --}}
                            <div class="col-lg-6 mb-3">
                                <label>Type</label>
                                <select name="type" class="form-control" required>
                                    <option value="">Select Type</option>
                                    <option value="Private">Private</option>
                                    <option value="Government">Government</option>

                                </select>
                            </div>

                            {{-- NAAC --}}
                            <div class="col-lg-6 mb-3">
                                <label>NAAC Grade <span class="text-danger">*</span></label>
                                <input type="text" name="naac_grade" placeholder="NAAC Grade" class="form-control" required>
                            </div>

                            {{-- ADDRESS --}}
                            <div class="col-lg-6 mb-3">
                                <label>Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" placeholder="Address" class="form-control" required>
                            </div>

                            {{-- DESCRIPTION --}}
                            <div class="col-lg-12 mb-3">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" placeholder="description" class="form-control" rows="4"
                                    required></textarea>
                            </div>

                            {{-- STATUS --}}
                            <div class="col-lg-6 mb-3">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-control" required>
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

    @foreach($colleges as $item)
        <div class="modal custom-modal fade" id="view_college{{ $item->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">View College</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <table class="table table-bordered table-striped align-middle mb-0 college-view-table">

                            <tr>
                                <th width="20%">State</th>
                                <td class="tableData" colspan="3">
                                    <div class="scroll-box">
                                        {{ $item->state->name ?? '-' }}
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th width="20%">Name</th>
                                <td class="tableData" colspan="3">
                                    <div class="scroll-box">
                                        {{ $item->name }}
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td class="tableData">{{ $item->email }}</td>
                            </tr>

                            <tr>
                                <th>Type</th>
                                <td class="tableData">{{ $item->type }}</td>
                            </tr>

                            <tr>
                                <th>NAAC Grade</th>
                                <td class="tableData">{{ $item->naac_grade }}</td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge bg-{{ $item->status == 'active' ? 'success' : 'danger' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <th>Address</th>
                                <td class="tableData" colspan="3">
                                    <div class="scroll-box">
                                        {{ $item->address }}
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th>Image</th>
                                <td>
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded"
                                            style="max-height:100px;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Description</th>
                                <td class="tableData" colspan="3">
                                    <div class="scroll-box">
                                        {{ $item->description }}
                                    </div>
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
                            <h4 class="mb-0">Edit College </h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>



                    <form action="{{ route('colleges.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="row">

                                {{-- STATE --}}
                                <div class="col-lg-6 mb-3">
                                    <label>State</label>
                                    <select name="state_id" class="form-control">
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}" {{ $item->state_id == $state->id ? 'selected' : '' }}>
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- NAME --}}
                                <div class="col-lg-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control">
                                </div>

                                {{-- SLUG --}}
                                <div class="col-lg-6 mb-3">
                                    <label>Slug</label>
                                    <input type="text" name="slug" value="{{ $item->slug }}" class="form-control">
                                </div>

                                {{-- EMAIL --}}
                                <div class="col-lg-6 mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ $item->email }}" class="form-control">
                                </div>

                                {{-- TYPE --}}
                                <div class="col-lg-6 mb-3">
                                    <label>Type</label>
                                    <input type="text" name="type" value="{{ $item->type }}" class="form-control">
                                </div>

                                {{-- NAAC --}}
                                <div class="col-lg-6 mb-3">
                                    <label>NAAC Grade</label>
                                    <input type="text" name="naac_grade" value="{{ $item->naac_grade }}" class="form-control">
                                </div>

                                {{-- ADDRESS --}}
                                <div class="col-lg-12 mb-3">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{ $item->address }}" class="form-control">
                                </div>

                                {{-- IMAGE --}}
                                <div class="col-lg-6 mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">

                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" width="80" class="mt-2">
                                    @endif
                                </div>

                                {{-- STATUS --}}
                                <div class="col-lg-6 mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{ $item->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $item->status == 'inactive' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>

                                {{-- DESCRIPTION --}}
                                <div class="col-lg-12 mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{ $item->description }}</textarea>
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
    <div class="modal fade" id="import_excel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5>Import Colleges</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="{{ route('colleges.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <label>Select Excel File</label>
                        <input type="file" name="file" class="form-control" required>

                        <small class="text-muted mt-2 d-block">
                            Allowed: .xlsx, .xls, .csv
                        </small>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Upload</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
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
                    title: 'Delete College?',
                    text: "This College will be permanently deleted!",
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