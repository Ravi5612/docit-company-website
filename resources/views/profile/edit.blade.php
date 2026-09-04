@extends('admin.layout.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>Profile</h5>

                </div>
            </div>
            <!-- /Page Header -->

            {{-- main --}}
            <div class="container-fluid">
                <div class="row">

                    <!-- Update Profile -->
                    <div class="col-lg-4 col-md-6">

                        @include('profile.partials.update-profile-information-form')

                    </div>


                    <!-- Update Password -->
                    <div class="col-lg-4 col-md-6">
                        @include('profile.partials.update-password-form')
                    </div>


                    <!-- Delete Account -->
                    <div class="col-lg-4 col-md-6">
                        @include('profile.partials.delete-user-form')

                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection
