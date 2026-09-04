@extends('website.layout.app')
@section('title', 'Our Clients | Dr IT Group')
@section('content')
    @include('website.components.our-clients.banner')
    @include('website.components.our-clients.client-grid')
@endsection