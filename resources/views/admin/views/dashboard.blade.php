@extends('admin.layout.app')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid pb-0">
            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header">
                    <h5>Dashboard</h5>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="super-dashboard">
                <div class="row">
                    <div class="col-xl-12 d-flex">
                        <div class="dash-user-card w-100">
                            <h4><i class="fe fe-sun"></i>Greetings of the day ! {{ Auth::user()->name }}</h4>
                            <h3 class="text-white">Have a Good day at work !!!</h3>
                            <div class="dash-btns">
                                <a href="{{ route('admin-blogs') }}" class="btn view-company-btn">View Blogs</a>
                               
                            </div>
                            <div class="dash-img">
                                <img src="{{ asset('admin/assets/img/dashboard-card-img.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 d-flex p-0">
                        <div class="row dash-company-row w-100 m-0">
                            <div class="col-lg-3 col-sm-6 d-flex">
                                <div class="company-detail-card w-100">
                                    <div class="company-icon">
                                        <img src="{{ asset('admin/assets/img/icons/dash-card-icon-01.svg') }}" alt="" />
                                    </div>
                                    <div class="dash-comapny-info">
                                        <h6>Total Blogs</h6>
                                        <h5>{{ $blogs ?? '5'}}</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 d-flex">
                                <div class="company-detail-card bg-info-light w-100">
                                    <div class="company-icon">
                                        <img src="{{ asset('admin/assets/img/icons/dash-card-icon-02.svg') }}" alt="" />
                                    </div>
                                    <div class="dash-comapny-info">
                                        <h6>Total Leads</h6>
                                        <h5>{{ $totalLeads ?? '8' }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 d-flex">
                                <div class="company-detail-card bg-pink-light w-100">
                                    <div class="company-icon">
                                        <img src="{{ asset('admin/assets/img/icons/dash-card-icon-03.svg') }}" alt="" />
                                    </div>
                                    <div class="dash-comapny-info">
                                        <h6>Total States</h6>
                                        <h5></h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 d-flex">
                                <div class="company-detail-card bg-success-light w-100">
                                    <div class="company-icon">
                                        <img src="{{ asset('admin/assets/img/icons/dash-card-icon-04.svg') }}" alt="" />
                                    </div>
                                    <div class="dash-comapny-info">
                                        <h6>Total Colleges</h6>
                                        <h5></h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-12 mb-4">
                        <div id="calendar"></div>
                    </div>






                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 500,

                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                events: [
                    {
                        title: 'Meeting',
                        start: '2026-04-25'
                    },
                    {
                        title: 'Event',
                        start: '2026-04-27',
                        end: '2026-04-29'
                    }
                ]
            });

            calendar.render();
        });
    </script>
@endpush