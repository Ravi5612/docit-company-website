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
                            <h5 class="mb-0">Social Feed Settings</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin-social-feed.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <!-- Facebook Page URL -->
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label fw-semibold">
                                            Facebook Page URL
                                        </label>

                                        <input type="url" name="facebook_page" class="form-control"
                                            placeholder="https://www.facebook.com/yourpage"
                                            value="{{ $socialFeed->facebook_page }}">

                                        <small class="text-muted">
                                            Enter only the Facebook Page URL.
                                        </small>
                                    </div>

                                    <!-- Instagram Embed -->
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label fw-semibold">
                                            Instagram Embed Code
                                        </label>

                                        <textarea name="instagram_embed" class="form-control" rows="8"
                                            placeholder="Paste Instagram Embed Code Here...">{{ $socialFeed->instagram_embed }}</textarea>

                                        <small class="text-muted">
                                            Paste the complete Instagram embed code.
                                        </small>
                                    </div>

                                    <!-- LinkedIn Embed -->
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label fw-semibold">
                                            LinkedIn Embed Code
                                        </label>

                                        <textarea name="linkedin_embed" class="form-control" rows="8"
                                            placeholder="Paste LinkedIn Embed Code Here...">{{ $socialFeed->linkedin_embed }}</textarea>

                                        <small class="text-muted">
                                            Paste the complete LinkedIn iframe/embed code.
                                        </small>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold">
                                            Status
                                        </label>

                                        <select name="is_active" class="form-select">
                                            <option value="1" {{ $socialFeed->is_active ? 'selected' : '' }}>
                                                Active
                                            </option>

                                            <option value="0" {{ !$socialFeed->is_active ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Button -->
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ti ti-device-floppy me-1"></i>
                                            Save Changes
                                        </button>
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