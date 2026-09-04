@extends('website.layout.app')
@section('title', 'Apply Now | Dr IT Group')
@section('content')

    <!-- page-title -->
    <div class="cmt-page-title-row bg-base-dark cmt-bg cmt-bgimage-yes clearfix mb-50">
        <div class="cmt-titlebar-wrapper-bg-layer cmt-bg-layer"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="cmt-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title">Apply Now</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <span>
                                <a title="Homepage" href="{{ route('contact-us') }}">Home</a>
                            </span>
                            <span>Apply Now</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->


    @include('website.components.career.form')
    @include('website.components.career.about')
@endsection
@push('scripts')

    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //  console.log('career page');
        document.getElementById('contact-form').addEventListener('submit', function (e) {

            e.preventDefault();

            grecaptcha.ready(function () {
                grecaptcha.execute('{{ env("RECAPTCHA_SITE_KEY") }}', {
                    action: 'career_form'
                }).then(function (token) {

                    document.getElementById('recaptcha-token').value = token;

                    document.getElementById('contact-form').submit();
                });
            });

        });
    </script>
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                confirmButtonColor: '#3085d6'
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#d33'
            });
        </script>
    @endif
@endpush