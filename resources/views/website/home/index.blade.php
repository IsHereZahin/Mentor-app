@extends('website.layouts.app')
@section('content')
    <!-- top navbar -->
    @include('website.components.navbar')

    <main id="main">
    @include('website.section.hero')
    @include('website.section.about')
    @include('website.section.content')
    @include('website.section.features')
    @include('website.section.courses')
    @include('website.section.trainer')
    </main><!-- End #main -->

    @include('website.components.footer')

@endsection
