@extends('website.layout.app')
@section('title', 'About Us | Dr IT Group')
@section('content')

    @include('website.components.about-us.banner')
    @include('website.components.about-us.about-section')
     @include('website.components.index.team-section')
    @include('website.components.about-us.counter')
    @include('website.components.about-us.why-choose-us-section')
    @include('website.components.index.testimonial')


@endsection