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
                                <h5 class="setting-menu">Website Settings</h5>
                            </div>

                            <div class="row">
                                <form class="row" action="{{ route('admin-settings.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- LOGO -->
                                    <div class="profile-picture col-6">
                                        <div class="upload-profile me-2">
                                            <div class="profile-img">
                                                <img id="logoPreview"
                                                    src="{{ $websiteSetting->logo ? asset('storage/' . $websiteSetting->logo) : asset('admin/assets/img/profiles/avatar-10.jpg') }}"
                                                    class="" width="100">

                                                <input type="file" name="logo" id="logoInput" hidden>
                                            </div>
                                        </div>

                                        <div class="img-upload">
                                            <label class="" for="logoInput">
                                                Upload Logo
                                            </label>

                                            <input type="file" name="logo" id="logoInput" class="form-control">
                                            <br>
                                            <span class="form-text text-muted">
                                                <small>Accepted file types: JPG, PNG, GIF (180*70)</small>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- LOGO -->
                                    <div class="profile-picture col-6">
                                        <div class="upload-profile me-2">
                                            <div class="profile-img bg-dark">
                                                <img id="logoWhitePreview"
                                                    src="{{ $websiteSetting->logo_white ? asset('storage/' . $websiteSetting->logo_white) : asset('admin/assets/img/profiles/avatar-10.jpg') }}"
                                                    class="" width="100">

                                                <input type="file" name="logo_white" id="logoWhiteInput" hidden>
                                            </div>
                                        </div>

                                        <div class="img-upload">
                                            <label class="">
                                                Upload Logo (White)

                                            </label>
                                            <input class="form-control" type="file" name="logo_white">
                                            <br>
                                            <span class="form-text text-muted">
                                                <small>Accepted file types: JPG, PNG, GIF (180*70)</small>
                                            </span>
                                        </div>
                                    </div>


                                    <hr>

                                    <!-- BRAND NAME -->
                                    <div class="input-block mb-3 col-6">
                                        <label>Brand Name</label>
                                        <input type="text" name="brand_name" class="form-control"
                                            value="{{ $websiteSetting->brand_name }}">
                                    </div>



                                    <!-- LOCATION -->
                                    <div class="col-lg-12">
                                        <div class="input-block mb-3">
                                            <label>Main Address</label>
                                            <textarea name="location" class="form-control" rows="3"
                                                placeholder="Enter Main Address">{{ $websiteSetting->location }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-block mb-3">
                                            <label>Noida Address</label>
                                            <textarea name="address_noida" class="form-control" rows="3"
                                                placeholder="Enter Noida Address">{{ $websiteSetting->address_noida }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-block mb-3">
                                            <label>Jaipur Address</label>
                                            <textarea name="address_jaipur" class="form-control" rows="3"
                                                placeholder="Enter Jaipur Address">{{ $websiteSetting->address_jaipur }}</textarea>
                                        </div>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="input-block mb-3 col-6">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $websiteSetting->email }}">
                                    </div>

                                    <!-- PHONE 1 -->
                                    <div class="input-block mb-3 col-6">
                                        <label>Phone 1</label>
                                        <input type="text" name="phone_1" class="form-control"
                                            value="{{ $websiteSetting->phone_1 }}">
                                    </div>

                                    <!-- PHONE 2 -->
                                    <div class="input-block mb-3 col-6">
                                        <label>Phone 2</label>
                                        <input type="text" name="phone_2" class="form-control"
                                            value="{{ $websiteSetting->phone_2 }}">
                                    </div>

                                    <!-- DESCRIPTION -->
                                    <div class="input-block mb-3 col-12">
                                        <label>Description</label>
                                        <textarea name="description"
                                            class="form-control">{{ $websiteSetting->description }}</textarea>
                                    </div>

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