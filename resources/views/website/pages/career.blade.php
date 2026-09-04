@extends('website.layout.app')
@section('title', 'Career | Dr IT Group')
@section('content')
    @include('website.components.career.banner')
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