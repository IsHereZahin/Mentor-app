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
                    <a href="{{ route('dashboard.trainer.index') }}">
                        <button class="btn btn-info m-3">Show trainer</button>
                    </a>
                </div>
            </div>
            <!-- trainer form -->
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('dashboard.trainer.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" hidden value="{{ $trainer->id }}">
                        <div class="card-body">
                            <h4 class="card-title">Edit Trainer</h4><hr>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Name<span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{ $trainer->name }}" class="form-control" placeholder="Name Here" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Department<span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="department" value="{{ $trainer->department }}" class="form-control" placeholder="Title Here" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Image<span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" value="{{ $trainer->image }}" class="form-control" onchange="previewImage(event)">
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
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Description<span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="description"> {{ $trainer->description }} </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Twitter Username<span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="twitterurl" class="form-control" value="{{ $trainer->twitterurl }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Facebook Username<span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="facebookurl" class="form-control" value="{{ $trainer->facebookurl }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Instagram Username<span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="instagramurl" class="form-control" value="{{ $trainer->instagramurl }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Linkedin Username<span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="linkedinurl" class="form-control" value="{{ $trainer->linkedinurl }}" required>
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
