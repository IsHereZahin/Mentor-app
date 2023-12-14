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
                    <a href="{{ route('dashboard.courses.index') }}">
                        <button class="btn btn-info m-3">Show course</button>
                    </a>
                </div>
            </div>
            <!-- hero form -->
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('dashboard.courses.update', ['id' => $course->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <h4 class="card-title">Edit Course</h4><hr>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Course Name <span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" value="{{ $course->name }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Category <span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="category" class="form-control" value="{{ $course->category }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Trainer <span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control form-select" name="trainer_id">
                                        @foreach($trainer as $trainer)
                                            <option value="{{ $trainer->id }}">{{ $trainer->name }}-{{ $trainer->department }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Course Fee <span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="number" step="any" name="fee" class="form-control" value="{{ $course->fee }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Total Seat <span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="number" name="total_seat" class="form-control" value="{{ $course->total_seat }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Schedule</label>
                                <div class="col-sm-9">
                                    <input type="text" name="schedule" class="form-control" value="{{ $course->schedule }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-end control-label col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" id="image" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                                    <img id="preview" src="#" alt="Preview" style="display: none; max-width: 100%; max-height: 200px;">
                                </div>
                            </div>
                            <script>
                                function previewImage(event) {
                                    var reader = new FileReader();

                                    reader.onload = function () {
                                        var preview = document.getElementById('preview');
                                        preview.src = reader.result;
                                        preview.style.display = 'block';
                                    };

                                    reader.readAsDataURL(event.target.files[0]);
                                }
                            </script>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Short Description <span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="short_desc" required>{{ $course->short_desc }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Long Description <span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="long_desc" required>{{ $course->long_desc }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
