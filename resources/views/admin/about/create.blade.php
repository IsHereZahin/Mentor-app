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
                <a href="{{ route('dashboard.about') }}">
                    <button class="btn btn-info m-3">Show about</button>
                </a>
            </div>
        </div>
        <!-- about form -->
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('dashboard.about.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Create about</h4><hr>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Title<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" placeholder="Title Here" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Top Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Title 1  <span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="title1" class="form-control" placeholder="Title 1 Here" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Title 2  <span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="title2" class="form-control" placeholder="Title 2 Here" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Title 3<span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="title3" class="form-control" placeholder="Title 3 Here" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description1"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 text-end control-label col-form-label">Image  <span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control" required >
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
