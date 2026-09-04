@extends('website.layout.app')
@section('title', 'Contact Us | Dr IT Group')
@section('content')
    @include('website.components.contact-us.banner')
    @include('website.components.contact-us.form')
    @include('website.components.contact-us.cards')
@endsection
@push('scripts')

    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const form = document.getElementById('contact-form');
            const tokenInput = document.getElementById('recaptcha-token');

            if (!form || !tokenInput) {
                return;
            }

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                grecaptcha.ready(function () {
                    grecaptcha.execute("{{ config('services.recaptcha.site_key') }}", { action: 'lead' })
                        .then(function (token) {

                            tokenInput.value = token;
                            form.submit();

                        });
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