@extends('admin.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- flash message -->
        <div class="col-md-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif

            <h1 class="text-center">About</h1>
        </div>
        <div class="col-md-12">
            @if($about)
            <div style="text-align: right">
                <a href="{{ route('dashboard.about.edit') }}">
                    <button class="btn btn-warning m-3">Edit</button>
                </a>
            </div>
            @else
                <a href="{{ route('dashboard.about.create') }}">
                    <button class="btn btn-info m-3">Create</button>
                </a>
            @endif
        </div>

        <!-- content -->
        <div class="col-md-12">
            @if($about)
                {{-- <div class="card">
                    <img src="{{ asset('images/about') }}/{{$about->image}}" class="card-img-top" alt="..." style="width: 100%; height:auto">
                    <div class="card-body">
                        <h5 class="card-title">{{ $about->title1 }}</h5>
                        <h5 class="card-title">{{ $about->title2 }}</h5>
                        <p class="card-text">{{ $about->description }}</p>
                        <a href="#" class="btn btn-primary">Get started : {{ $about->url }}</a>
                    </div>
                </div> --}}
                    <!-- ======= About Section ======= -->
                <div class="row">
                    <div class="col-md-12" style="padding: 50px">
                        <h5>{{ $about->headdescription }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <section id="about" class="about">
                            <div class="container" data-aos="fade-up">

                            <div class="row">
                                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                                    <img src="{{ asset('images/about') }}/{{ $about->image }}" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                                <h3>{{ $about->title }}</h3>
                                <p class="fst-italic">{{ $about->description }}</p>
                                <ul>
                                    <li><i class="bi bi-check-circle"></i> {{ $about->title1 }}</li>
                                    <li><i class="bi bi-check-circle"></i> {{ $about->title2 }}</li>
                                    <li><i class="bi bi-check-circle"></i>{{ $about->title3 }}</li>
                                </ul>
                                <p>{{ $about->description1 }}</p>

                                </div>
                            </div>

                            </div>
                        </section><!-- End About Section -->
                        <div class="danger text-center">
                            <div class="danger-titl text-danger" style="margin-top: 150px">Danger Zone</div>
                            <a href="{{ route('dashboard.about.delete') }}">
                                <button type="button" class="btn btn-danger mt-3">Delete</button>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info"> No data found.</div>
            @endif
        </div>

    </div>
</div>



@endsection
