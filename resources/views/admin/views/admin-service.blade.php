@extends('admin.layout.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>services </h5>
                    <div class="list-btn">
                        <ul class="filter-list">


                            <li>
                                <a class="btn btn-primary" href="javascript:void(0);" data-bs-toggle="modal"
                                    data-bs-target="#add_category"><i class="fa fa-plus-circle me-2"
                                        aria-hidden="true"></i>Add Service</a>
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
                                            <th># </th>
                                            <th>Service Title</th>
                                            <th>Status</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($Services as $service)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="" class="product-list-service-img">
                                                        <span>{{ $service->title }}</span></a></td>
                                                <td> <span
                                                        class="badge bg-{{ $service->status == 'active' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($service->status) }}
                                                    </span></td>
                                                <td class="d-flex align-services-center">
                                                    <a class="btn-action-icon me-2" href="javascript:void(0);"
                                                        data-bs-toggle="modal" data-bs-target="#view_service{{ $service->id }}">
                                                        <i class="fe fe-eye"></i>
                                                    </a>

                                                    <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                        data-bs-toggle="modal" data-bs-target="#edit_category{{ $service->id }}"><i
                                                            class="fe fe-edit"></i></a>

                                                    <form action="{{ route('admin-service.destroy', $service->id) }}"
                                                        method="POST" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="button"
                                                            class="btn-action-icon border-0 bg-transparent delete-btn">
                                                            <i class="fe fe-trash-2"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td>No services found yet.</td>
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
    <!-- Add service Modal -->
    <div class="modal custom-modal fade" id="add_category" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div class="form-header modal-header-title text-start mb-0">
                        <h4 class="mb-0">Add service</h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>

                <form action="{{ route('admin-service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <label>Service Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug" class="form-control" placeholder="Enter Slug" readonly>
                            </div>



                            <div class="col-lg-6 mb-3">
                                <label>service Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" required>
                                <span class="form-text text-muted">Size : 770 * 515(max size : 5MB)</span>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>service Image  2<span class="text-danger">*</span></label>
                                <input type="file" name="image_2" class="form-control" required>
                                <span class="form-text text-muted">Size : 770 * 515(max size : 5MB)</span>
                            </div>



                            <div class="col-lg-12 mb-3">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" placeholder="Enter Your Description" class="form-control"
                                    rows="4" required></textarea>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label>Overview <span class="text-danger">*</span></label>
                                <textarea name="overview" placeholder="Enter Your Overview" class="form-control" rows="4"
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
                        <button type="submit" class="btn btn-primary">Add service</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- /Add  Modal -->
    {{-- view modal --}}

    @foreach($Services as $service)
        <div class="modal custom-modal fade" id="view_service{{ $service->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">View service</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <table class="table table-bordered table-striped mb-0">

                            <tr>
                                <th>Title :</th>
                                <td class="tabledata">
                                    <div class="scroll-box">
                                        {{ $service->title }}
                                    </div>
                                </td>


                            </tr>

                            <tr>


                                <th>Status :</th>
                                <td>
                                    <span class="badge bg-{{ $service->status == 'active' ? 'success' : 'danger' }}">
                                        {{ ucfirst($service->status) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>service Image :</th>
                                <td colspan="3">
                                    @if($service->image)
                                        <img src="{{ asset('storage/' . $service->image) }}" width="120">
                                    @endif
                                </td>


                            </tr>
                            <tr>
                                <th>service Image 2 :</th>
                                <td colspan="3">
                                    @if($service->image_2)
                                        <img src="{{ asset('storage/' . $service->image_2) }}" width="120">
                                    @endif
                                </td>


                            </tr>



                            <tr>
                                <th>Description :</th>
                                <td class="tableData">
                                    <div class="scroll-box">
                                        {{ $service->description }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Overview :</th>
                                <td class="tableData">
                                    <div class="scroll-box">
                                        {{ $service->overview }}
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
        <div class="modal custom-modal fade" id="edit_category{{ $service->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">Edit service</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <form action="{{ route('admin-service.update', $service->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="row">

                                <div class="col-lg-12">
                                    <label>Service Title *</label>
                                    <input type="text" name="title" class="form-control" value="{{ $service->title }}">
                                </div>

                                <div class="col-lg-12">
                                    <label>Slug *</label>
                                    <input type="text" name="slug" class="form-control" value="{{ $service->slug }}">
                                </div>



                                <div class="col-lg-6">
                                    <label>service Image</label>
                                    <input type="file" name="image" class="form-control">

                                    @if($service->image)
                                        <img src="{{ asset('storage/' . $service->image) }}" width="80" class="mt-2">
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>service Image 2</label>
                                    <input type="file" name="image_2" class="form-control">

                                    @if($service->image_2)
                                        <img src="{{ asset('storage/' . $service->image_2) }}" width="80" class="mt-2">
                                    @endif
                                </div>


                                <div class="col-lg-12">
                                    <label>Description *</label>
                                    <textarea name="description" class="form-control"
                                        rows="4">{{ $service->description }}</textarea>
                                </div>
                                <div class="col-lg-12">
                                    <label>Overview *</label>
                                    <textarea name="overview" class="form-control" rows="4">{{ $service->overview }}</textarea>
                                </div>

                                <div class="col-lg-6">
                                    <label>Status *</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{ $service->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $service->status == 'inactive' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update service</button>
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
        document.querySelectorAll('input[name="title"]').forEach(function (input) {
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
                    title: 'Delete service?',
                    text: "This service will be permanently deleted!",
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