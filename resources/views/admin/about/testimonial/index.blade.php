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

            <h1 style="text-align: center">Testimonial</h1>
        </div>
        <div class="col-md-12">
            <a href="{{ route('dashboard.testimonial.create') }}">
                <button class="btn btn-info m-3">Add Testimonial</button>
            </a>
        </div>

        <!-- content -->
        <div class="col-md-12">

            @foreach ($testimonial as $key=>$testimonial)

            <div class="row">
                <div class="card">
                    <div style="padding: 50px">
                      <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('images/testimonial') }}/{{ $testimonial->image ?? ''}}" class="float-start" style="height: 200px; width: 200px; border-radius: 50%;">
                        </div>
                        <div class="col-md-9">
                            <h3>{{ $testimonial->name ?? ''}}</h3>
                            <h4>{{ $testimonial->title ?? ''}}</h4>
                            <p>
                              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{ $testimonial->comment ?? ''}}
                              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <div>
                                <a href="{{ route('dashboard.testimonial.edit', $testimonial->id) }}">
                                    <button class="btn btn-warning m-3">Edit</button>
                                </a>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <!-- End testimonial item -->
            @endforeach

            {{-- @else
                <div class="alert alert-info"> No data found.</div>
            @endif --}}
        </div>

    </div>
</div>



@endsection
