@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div style="float: right">
                    <a href="{{ route('dashboard.package.index') }}">
                        <button class="btn btn-info m-3">Show package</button>
                    </a>
                </div>
            </div>
            <!-- hero form -->
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('dashboard.package.update', ['id' => $package->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Add this line for Laravel to recognize the update method -->

                        <div class="card-body">
                            <h4 class="card-title">Edit Package</h4><hr>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Title <span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" value="{{ $package->title }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Tag </label>
                                <div class="col-sm-9">
                                    <input type="text" name="tag" class="form-control" value="{{ $package->tag }}" placeholder="Tag Here" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Price <span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <input type="number" name="price" value="{{ $package->price }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Duration <span class="text-danger"> *</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control form-select" name="duration" required>
                                        <option value="monthly" {{ $package->duration == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                        <option value="yearly" {{ $package->duration == 'yearly' ? 'selected' : '' }}>Yearly</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-end control-label col-form-label">Package Features :</label>
                                    <div class="col-sm-9 font-16">
                                        @foreach($features as $feature)
                                        <input type="checkbox" name="feature[]" value="{{ $feature->id }}" {{ $package->packageFeature->contains('feature_id', $feature->id) ? 'checked' : '' }} /> {{ $feature->name }} <br>
                                        @endforeach
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
