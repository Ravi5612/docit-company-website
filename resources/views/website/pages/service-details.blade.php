@extends('website.layout.app')
@section('title', 'Service Details | Dr IT Group')
@section('content')

    @include('website.components.services.banner')
    <div class="cmt-row sidebar cmt-sidebar-left clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                @include('website.components.services.sidebar')
                @include('website.components.services.main')
            </div><!-- row end -->
        </div>
    </div>
@endsection