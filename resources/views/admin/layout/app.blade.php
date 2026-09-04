<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('website/images/fav.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/feather/feather.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/datatables.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <!-- Layout Js -->
    <script src="{{ asset('admin/assets/js/layout.js') }}"></script>
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">


    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

    <style>
        #calendar {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        {{-- header include --}}
        @include('admin.components.header')
        {{-- sidebar --}}
        @include('admin.components.sidebar')
        {{-- content page wise --}}
        @yield('content')

    </div>





    <!-- jQuery -->
    <script src="{{ asset('admin/assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Datatable JS -->
    <script src="{{ asset('admin/assets/plugins/datatables/datatables.min.js') }}"></script>

    <!-- select CSS -->
    <script src="{{ asset('admin/assets/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Datepicker Core JS -->
    <script src="{{ asset('admin/assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Apexchart JS -->
    <script src="{{ asset('admin/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/apexchart/chart-data.js') }}"></script>

    <!-- multiselect JS -->
    <script src="{{ asset('admin/assets/js/jquery-ui.min.js') }}"></script>

    <!-- Theme Settings JS -->
    <script src="{{ asset('admin/assets/js/theme-settings.js') }}"></script>
    <script src="{{ asset('admin/assets/js/greedynav.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
    {{-- swal --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- for the push script of the pages --}}
    @stack('scripts')
</body>

</html>