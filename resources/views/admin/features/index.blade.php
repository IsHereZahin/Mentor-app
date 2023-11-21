<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('website/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <style>
        /*--------------------------------------------------------------
        # Features
        --------------------------------------------------------------*/
        .features {
        padding-top: 0px;
        }

        .features .icon-box {
        display: flex;
        align-items: center;
        padding: 20px;
        transition: 0.3s;
        border: 1px solid #eef0ef;
        }

        .features .icon-box i {
        font-size: 32px;
        padding-right: 10px;
        line-height: 1;
        }

        .features .icon-box h3 {
        font-weight: 700;
        margin: 0;
        padding: 0;
        line-height: 1;
        font-size: 16px;
        }

        .features .icon-box h3 a {
        color: #37423b;
        transition: 0.3s;
        }

        .features .icon-box:hover {
        border-color: #5fcf80;
        }

        .features .icon-box:hover h3 a {
        color: #5fcf80;
        }
        .action{
            text-align: right;
            margin-top: -55px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
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

                <h1 style="text-align: center">Features</h1>
            </div>
            <div class="col-md-12">
                <a href="{{ route('dashboard.features.create') }}">
                    <button class="btn btn-info m-3">Add Features</button>
                </a>
            </div>

            <!-- content -->
                    <!-- ======= Features Section ======= -->
            <section id="features" class="features">
                <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($features as $features)
                    <div class="col-lg-3 col-md-4">
                        <div class="icon-box">
                        <i class="{{ $features->classname }}" style="color: {{ $features->color }};"></i>
                        <h3><a href="">{{ $features->name }}</a></h3>
                        </div>

                        <div class="action">
                            <a href="{{ route('dashboard.features.edit', $features->id) }}">
                                <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            </a>
                            <a href="{{ route('dashboard.features.delete', $features->id) }}">
                                <button class="btn btn-secondary"><i class="fas fa-trash"></i></button>
                            </a>
                        </div>

                    </div>
                    @endforeach

                </div>

                </div>
            </section><!-- End Features Section -->

        </div>
    </div>



    @endsection
</body>
</html>
