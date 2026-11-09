@extends('website.layout.app')
@section('title', 'Careers | Dr IT Group')
@section('content')

    <!-- 1. Hero Section: BUILD YOUR FUTURE WITH US -->
    @include('website.components.career.hero')

    <!-- 2. Why Join Dr IT Group? -->
    @include('website.components.career.why-join')

    <!-- 3. Explore Current Openings -->
    @include('website.components.career.openings')

    <!-- 4. How to Apply -->
    @include('website.components.career.how-to-apply')

@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
