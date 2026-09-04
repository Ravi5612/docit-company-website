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
                        <div class="card-body w-100">
                            <div class="content-page-header">
                                <h5 class="setting-menu">Social Settings</h5>
                            </div>

                            <div class="row">
                                <form class="row" action="{{ route('admin-social-settings.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- FACEBOOK -->
                                    <div class="input-block mb-3 col-6">
                                        <label>Facebook URL</label>
                                        <input type="url" name="facebook_url" placeholder="Enter Facebook Link" class="form-control" value="{{ $socialSetting->facebook_url }}">
                                    </div>

                                    <!-- INSTAGRAM -->
                                    <div class="input-block mb-3 col-6">
                                        <label>Instagram URL</label>
                                        <input type="url" name="instagram_url" placeholder="Enter Instagram Link" class="form-control" value="{{ $socialSetting->instagram_url }}">
                                    </div>

                                    <!-- TWITTER -->
                                    <div class="input-block mb-3 col-6">
                                        <label>Twitter URL</label>
                                        <input type="url" name="twitter_url" placeholder="Enter Twitter Link" class="form-control" value="{{ $socialSetting->twitter_url }}">
                                    </div>

                                    <!-- LINKEDIN -->
                                    <div class="input-block mb-3 col-6">
                                        <label>LinkedIn URL</label>
                                        <input type="url" name="linkedin_url" placeholder="Enter LinkedIn Link" class="form-control" value="{{ $socialSetting->linkedin_url }}">
                                    </div>

                                    <!-- STATUS -->
                                    <!-- <div class="form-check mb-3">
                                        <input type="checkbox" name="is_active" class="form-check-input" {{ $socialSetting->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label">Active</label>
                                    </div> -->

                                    <!-- SUBMIT -->
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
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
@endpush