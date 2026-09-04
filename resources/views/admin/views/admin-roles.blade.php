@extends('admin.layout.app')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="content-page-header ">
                <h5>Roles </h5>
                <div class="list-btn">
                    <ul class="filter-list">
                        @can('create roles permissions')
                        <li>
                            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#add_role"><i
                                    class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Roles</a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center table-hover datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>S No.</th>
                                        <th>Role Name</th>
                                        <th>Created at</th>
                                        <th class="no-sort">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->created_at->format('d M Y, h:i A') }}</td>
                                        <td class="d-flex align-items-center">
                                            @can('edit roles permissions')
                                            <!-- Edit -->
                                            <a class="btn-action-icon me-2" href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#edit_role_{{ $role->id }}">
                                                <i class="fe fe-edit"></i>
                                            </a>
                                            @endcan
                                            @can('delete roles permissions')
                                            <!-- Delete -->
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="btn-action-icon border-0 bg-transparent delete-btn"
                                                    data-role="{{ $role->name }}">
                                                    <i class="fe fe-trash-2"></i>
                                                </button>
                                            </form>
                                            @endcan

                                        </td>
                                    </tr>
                                    @empty
                                    <td></td>
                                    <td>
                                        <p>No Roles found yet</p>
                                    </td>
                                    <td></td>
                                    <td></td>
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
<!-- /Page Wrapper -->



<!-- Add Role Modal -->
<div class="modal custom-modal fade" id="add_role" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0">Add Role</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <!-- Role Name -->
                    <div class="mb-3">
                        <label>Role Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <!-- Permissions -->
                    <h5 class="mb-2">Assign Permissions</h5>

                    <div class="row">
                        @foreach($permissions as $permission)
                        <div class="col-md-4">
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Role</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Add Role Modal -->
@foreach($roles as $role)
<!-- Edit Role Modal -->

<div class="modal custom-modal fade" id="edit_role_{{ $role->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5>Edit Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <!-- Role Name -->
                    <div class="mb-3">
                        <label>Role Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
                    </div>

                    <!-- Permissions -->
                    <h5 class="mb-2">Update Permissions</h5>

                    <div class="row">
                        @foreach($permissions as $permission)
                        <div class="col-md-4">
                            <label>
                                <input type="checkbox" name="permissions[]"
                                    value="{{ $permission->name }}"
                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                {{ $permission->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Edit Role Modal -->
@endforeach
</div>
<!-- /Main Wrapper -->

@endsection
@push('scripts')

@if(session('success'))

<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('
        success ') }}',
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
    $(document).ready(function() {

        $('.delete-btn').click(function(e) {
            e.preventDefault();

            var form = $(this).closest('form');
            var roleName = $(this).data('role');

            //Block super-admin
            if (roleName === 'super-admin') {
                Swal.fire({
                    icon: 'error',
                    title: 'Not Allowed',
                    text: "You can't delete Super Admin role!"
                });
                return;
            }

            //  Normal delete
            Swal.fire({
                title: 'Delete Role?',
                text: "This role will be permanently deleted!",
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
@endpush