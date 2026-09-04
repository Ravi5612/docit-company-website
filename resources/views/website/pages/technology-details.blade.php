@extends('website.layout.app')
@section('title', 'Technology Details | Dr IT Group')
@section('content')
    @include('website.components.technology.banner')

    <div class="cmt-row sidebar cmt-sidebar-right clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                @include('website.components.technology.main')
                @include('website.components.technology.sidebar')
            </div><!-- row end -->
        </div>
    </div>

@endsection