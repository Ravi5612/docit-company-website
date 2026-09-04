@extends('admin.layout.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>Admin Users </h5>
                    <div class="list-btn">
                        <ul class="filter-list">

                            @can('create users')
                                <li>
                                    <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#add_role"><i
                                            class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add user</a>
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
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Role</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->mobile }}</td>

                                                <td>
                                                    @foreach($user->roles as $role)
                                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                                    @endforeach
                                                </td>

                                                <td>{{ $user->created_at->format('d M Y') }}</td>

                                                <td class="d-flex">
                                                    @can('edit users')
                                                        <!-- Edit -->
                                                        <a class="btn-action-icon me-2" data-bs-toggle="modal"
                                                            data-bs-target="#edit_user_{{ $user->id }}">
                                                            <i class="fe fe-edit"></i>
                                                        </a>
                                                    @endcan
                                                    @can('delete users')
                                                        <!-- Delete -->
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                            class="d-inline delete-form">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="button"
                                                                class="btn-action-icon border-0 bg-transparent delete-btn"
                                                                data-role="{{ $user->roles->first()->name ?? '' }}">
                                                                <i class="fe fe-trash-2"></i>
                                                            </button>
                                                        </form>
                                                    @endcan

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td>No Users Found</td>
                                                <td></td>
                                                <td></td>
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
    <!-- /Page Wrapper -->



    <!-- Add Role Modal -->
    <div class="modal custom-modal fade" id="add_role" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div class="form-header modal-header-title text-start mb-0">
                        <h4 class="mb-0">Add User</h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div class="modal-body">

                        <!-- Role Name -->
                        <div class="mb-3">
                            <label>User Name</label>
                            <input type="text" name="name" placeholder="User" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>User Email</label>
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Mobile</label>
                            <input type="text" name="mobile" placeholder="909090 ****" class="form-control">
                        </div>

                        <!-- Permissions -->
                        <h5 class="mb-2">Assign Role</h5>

                        <div class="mb-2">
                            <label>Role</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="********" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" placeholder="********" class="form-control"
                                required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach($users as $user)
        <div class="modal fade" id="edit_user_{{ $user->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-body">
                                <label>User Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control mb-2">
                                <label>Role Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control mb-2">
                                <label>User Mobile</label>
                                <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control mb-2">
                                <label>User Role</label>
                                <select name="role" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
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
        $(document).ready(function () {

            $('.delete-btn').click(function (e) {
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