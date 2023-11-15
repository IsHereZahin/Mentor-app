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

            <div class="col-md-12" style="text-align: right">
                <div style="float: right">
                    <a href="{{ route('dashboard.testimonial.index') }}">
                        <button class="btn btn-info m-3">Show testimonial</button>
                    </a>
                </div>
            </div>
            <!-- testimonial form -->
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('dashboard.testimonial.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" hidden value="{{ $testimonial->id }}">
                        <div class="card-body">
                            <h4 class="card-title">Edit testimonial</h4><hr>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Name<span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{ $testimonial->name }}" class="form-control" placeholder="Name Here" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Title<span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" value="{{ $testimonial->title }}" class="form-control" placeholder="Title Here" required>
                                </div>
                            </div>

                            {{--  <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Image<span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" value="{{ $testimonial->image }}" class="form-control">
                                </div>
                            </div>
                              --}}
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Image<span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" value="{{ $testimonial->image }}" class="form-control" onchange="previewImage(event)">
                                    <img id="preview" src="#" alt="Preview" style="display: none; max-width: 100%; max-height: 200px;">
                                </div>
                            </div>

                            <script>
                                function previewImage(event) {
                                    var reader = new FileReader();
                                    reader.onload = function() {
                                        var preview = document.getElementById('preview');
                                        preview.src = reader.result;
                                        preview.style.display = 'block';
                                    }
                                    reader.readAsDataURL(event.target.files[0]);
                                }
                            </script>


                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Comment<span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="comment"> {{ $testimonial->comment }} </textarea>
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
