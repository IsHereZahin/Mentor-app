@extends('website.layouts.app')
@section('content')
    <!-- top navbar -->
    @include('website.components.navbar')

    @include('website.section.hero')
    @include('website.section.about')
    @include('website.section.courses')
    @include('website.section.content')

    @include('website.components.footer')

@endsection
