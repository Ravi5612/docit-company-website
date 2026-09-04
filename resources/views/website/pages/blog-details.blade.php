@extends('website.layout.app')
@section('title', 'Blog Details | Dr IT Group')
@section('content')

    @include('website.components.our-blogs.blog-details.banner')


    <div class="site-main">


        <div class="cmt-row sidebar cmt-sidebar-right clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    @include('website.components.our-blogs.blog-details.detail')
                    @include('website.components.our-blogs.blog-details.sidebar')

                </div><!-- row end -->
            </div>
        </div>


    </div><!--site-main end-->
@endsection