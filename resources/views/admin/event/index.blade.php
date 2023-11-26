@extends('admin.layouts.master')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Event manage</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Event</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-md-12">
            <div style="float: right">
                <a href="{{ route('dashboard.event.create') }}">
                    <button class="btn btn-info m-3">Create Event</button>
                </a>
            </div>
        </div>

        <!-- content -->
            @if ($events)
            @foreach ($events as $event)
            <div class="col-md-6">
                <div class="card">

                    <div class="action p-3">
                        <a href="{{ route('dashboard.event.edit', $event->id) }}">
                            <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                        </a>
                        <a href="{{ route('dashboard.event.delete', $event->id) }}">
                            <button class="btn btn-secondary"><i class="fas fa-trash"></i></button>
                        </a>
                    </div>

                    <img src="{{ asset('images/events') }}/{{$event->image}}" class="card-img-top" alt="..." style="width: 100%; height:auto">
                    <div class="card-body">
                        <h3 class="card-title text-center">{{ $event->title }}</h3>
                        <h5 class="card-title text-center">{{ $event->time }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach()
            @else
                <div class="alert alert-info"> No data found.</div>
            @endif

    </div>
</div>



@endsection
