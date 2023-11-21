@extends('admin.layouts.master')
@section('content')

    <!-- resources/views/Features_view.blade.php -->

    <form method="POST" action="{{ route('dashboard.features.store') }}">
        @csrf
        <div class="card-body">
            <h4 class="card-title">Create Hero</h4><hr>

            <div class="form-group row">
                <label for="" class="col-sm-3 text-end control-label col-form-label">Name<span class="text-danger"> *</span></label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" placeholder="Enter name here" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-3 text-end control-label col-form-label">Icon Class Name Menu:<span class="text-danger"> *</span></label>
                <div class="col-sm-9">
                    <select name="classname" id="dropdown">
                        <option value="ri-store-line">ri-store-line</option>
                        <!-- ... (other options) ... -->
                        <option value="other">Other</option>
                    </select>

                    <div id="otherOption" style="display: none;">
                        <label for="textbox" class="text-end control-label col-form-label">Other Option:</label>
                        <input type="text" name="classname" class="form-control" placeholder="Other class name here" required>
                    </div>
                </div>
            </div>

            <script>
                document.getElementById('dropdown').addEventListener('change', function() {
                    var otherOption = document.getElementById('otherOption');
                    otherOption.style.display = this.value === 'other' ? 'block' : 'none';
                });
            </script>


            <div class="form-group row">
                <label for="" class="col-sm-3 text-end control-label col-form-label">Color Name</label>
                <div class="col-sm-9">
                    <input type="text" name="color" class="form-control" placeholder="Enter color name/code here">
                </div>
            </div>

        </div>

        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection
