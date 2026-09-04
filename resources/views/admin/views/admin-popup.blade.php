@extends('admin.layout.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->

            <!-- /Page Header -->

            <div class="row">
                <div class="col-xl-3 col-md-4">

                    <div class="card">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="content-page-header">
                                    <h5>Settings</h5>
                                </div>
                            </div>
                            {{-- sidebar for setting --}}
                            @include('admin.components.setting.sidebar')
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Popup Settings</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin-popup.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <!-- Image Preview -->
                                    <div class="col-lg-4">
                                        <div class="border rounded text-center p-3">
                                            <img id="imagePreview"
                                                src="{{ $popup->image ? asset('storage/' . $popup->image) : asset('admin/assets/img/no-image.png') }}"
                                                class="img-fluid rounded" style="max-height:250px; object-fit:cover;">

                                            <p class="text-muted mt-3 mb-0">
                                                Current Popup Image
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Form -->
                                    <div class="col-lg-8">

                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">
                                                Popup Image
                                            </label>

                                            <input type="file" name="image" id="imageInput" class="form-control">

                                            <small class="text-muted">
                                                Allowed: JPG, JPEG, PNG, WEBP  Recommended height: 400 pixels.
                                            </small>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">
                                                Status
                                            </label>

                                            <select name="is_active" class="form-select">
                                                <option value="1" {{ $popup->is_active ? 'selected' : '' }}>
                                                    Active
                                                </option>

                                                <option value="0" {{ !$popup->is_active ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>
                                        </div>

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ti ti-device-floppy me-1"></i>
                                                Save Changes
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
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
        document.getElementById('imageInput').addEventListener('change', function () {
            const file = this.files[0];

            if (file) {
                document.getElementById('imagePreview').src = URL.createObjectURL(file);
            }
        });
    </script>
@endpush