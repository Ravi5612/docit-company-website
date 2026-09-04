@extends('admin.layout.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>Contact Leads</h5>
                    <div class="list-btn">
                        <ul class="filter-list">

                            @can('delete leads')
                                <li>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-danger btn-rounded deleteSelected">Delete
                                            Selected</a>
                                    </div>
                                </li>
                            @endcan

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->



            <div class="row">
                <div class="col-sm-12">
                    <div class=" card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>
                                                <input type="checkbox" id="selectAll">
                                            </th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Specialization</th>
                                            <th>Experience</th>
                                            <th>Applied On</th>
                                            <th class="no-sort">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($applications as $application)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="checkItem" value="{{ $application->id }}">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>{{ $application->name }}</td>
                                                <td>{{ $application->email }}</td>
                                                <td>{{ $application->specialization }}</td>
                                                <td>{{ $application->experience }}</td>
                                                <td>{{ $application->created_at->format('d M Y') }}</td>

                                                <td class="d-flex align-items-center">
                                                    @can('view leads')
                                                        <a class="btn-action-icon me-2" href="javascript:void(0);"
                                                            data-bs-toggle="modal" data-bs-target="#view_lead{{ $application->id }}">
                                                            <i class="fe fe-eye"></i>
                                                        </a>
                                                    @endcan
                                                    @can('delete leads')
                                                        <form action="{{ route('admin-career-applications.destroy', $application->id) }}" method="POST"
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
                                                <td class="text-center">No career applications found.</td>
                                                <td></td>
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
        </div>
    </div>

    @foreach($applications as $item)
        <div class="modal custom-modal fade" id="view_lead{{ $item->id }}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">
                        <div class="form-header modal-header-title text-start mb-0">
                            <h4 class="mb-0">View Career Application</h4>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <table class="table table-bordered table-striped mb-0">

                            <tr>
                                <th>Name :</th>
                                <td>{{ $item->name }}</td>

                                <th>Email :</th>
                                <td>{{ $item->email }}</td>
                            </tr>

                            <tr>
                                <th>Phone :</th>
                                <td>{{ $item->phone }}</td>

                                <th>Specialization  :</th>
                                <td>{{ $item->specialization }}</td>
                            </tr>
                            <tr>
                                <th>Qualification :</th>
                                <td>{{ $item->designation }}</td>

                                <th>Department :</th>
                                <td>{{ $item->department }}</td>
                            </tr>

                            <tr>
                                <th>Experience :</th>
                                <td>{{ $item->experience }}</td>

                                <th>Resume :</th>
                                <td>
                                    @if($item->resume)
                                        <a href="{{ asset('storage/' . $item->resume) }}" target="_blank"
                                            class="btn btn-sm btn-primary">
                                            View Resume
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Applied On :</th>
                                <td colspan="3">{{ $item->created_at->format('d M Y, h:i A') }}</td>

                                
                            </tr>

                            <tr>
                                <th>Message :</th>
                                <td colspan="3">
                                    {{ $item->message ?? 'N/A' }}
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
    @endforeach
@endsection
@push('scripts')

    <script>


        $(document).ready(function () {

            $('.delete-btn').click(function (e) {
                e.preventDefault();

                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Delete Application?',
                    text: "This application will be permanently deleted!",
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

        // SELECT ALL
        $("#selectAll").click(function () {

            $(".checkItem").prop('checked', $(this).prop('checked'));

        });

        // if any checkbox unchecked -> uncheck select all
        $(".checkItem").click(function () {

            if ($(".checkItem:checked").length == $(".checkItem").length) {
                $("#selectAll").prop('checked', true);
            } else {
                $("#selectAll").prop('checked', false);
            }

        });
        // DELETE SELECTED
        $('.deleteSelected').click(function () {

            let selected = [];

            $(".checkItem:checked").each(function () {
                selected.push($(this).val());
            });

            if (selected.length === 0) {
                Swal.fire("Oops!", "Please select at least one application.", "warning");
                return;
            }

            Swal.fire({
                title: "Are you sure?",
                text: "Selected application will be deleted permanently!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete selected!"
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        url: "/career-applications/delete-selected",

                        type: "POST",
                        data: {
                            ids: selected,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            Swal.fire("Deleted!", "Selected application removed.", "success");

                            selected.forEach(id => {
                                $(`input[value='${id}']`).closest("tr").fadeOut(500, function () {
                                    $(this).remove();
                                });
                            });
                        },
                        error: function (xhr) {
                            // console.log(xhr.responseText);
                            Swal.fire("Error!", "Something went wrong. Check console.", "error");
                        }
                    });

                }
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
@endpush