@extends('admin.layouts.app')
@section('title', isset($attribute->id) ? 'Edit Car' : 'Add Car')
@section('section')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Car Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Car Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Car</h3>
                            </div>
                            <form class="attribute-form" method="post" action="{{ route('admin.cars.store') }}" enctype="multipart/form-data">
                                  {{-- route('catalog.editCar', $attribute->id) --}}
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="location" id="location" required class="form-control">
                                                    <option value="">Select Location</option>
                                                    @foreach($locations as $location)
                                                        <option value="{{$location->name}}">{{$location->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="condition" id="condition" class="form-control">
                                                    <option value="">Select Condition</option>
                                                    <option value="Like New">Like New</option>
                                                    <option value="New">New</option>
                                                    <option value="Used">Used</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="make_id" id="make_id" class="form-control">
                                                    <option value="">Select Make</option>
                                                    @foreach($makes as $make)
                                                        <option value="{{$make->name}}">{{$make->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="model_id" id="model_id" class="form-control">
                                                    <option value="">Select Model</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="mileage" id="mileage" placeholder="Mileage" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="year" class="form-control" name="year" id="year" placeholder="Year" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="exterior_color" id="exterior_color" placeholder="Exterior Color" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="fuel_type" id="fuel_type" class="form-control">
                                                    <option value="">Select Fuel Type</option>
                                                    <option value="Diesel">Diesel</option>
                                                    <option value="Ethanol">Ethanol</option>
                                                    <option value="Electric">Electric</option>
                                                    <option value="Fuel">Fuel</option>
                                                    <option value="Gasoline">Gasoline</option>
                                                    <option value="Hybrid">Hybrid</option>
                                                    <option value="LPG Autogas">LPG Autogas</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="transmission" id="transmission" class="form-control">
                                                    <option value="">Select Transmission</option>
                                                    <option value="Automatic">Automatic</option>
                                                    <option value="Manual">Manual</option>
                                                    <option value="Semi-automatic">Semi-automatic</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="steering" id="steering" class="form-control">
                                                    <option value="">Select Steering</option>
                                                    <option value="LHD">LHD</option>
                                                    <option value="RHD">RHD</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="drive" id="drive" class="form-control">
                                                    <option value="">Select Drive</option>
                                                    <option value="FWD">FWD</option>
                                                    <option value="RWD">RWD</option>
                                                    <option value="AWD">AWD</option>
                                                    <option value="4WD">4WD</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="drive" id="drive" class="form-control">
                                                    <option value="">Select Engine</option>
                                                    <option value="1000">1000</option>
                                                    <option value="1500">1500</option>
                                                    <option value="2000">2000</option>
                                                    <option value="4000">4000</option>
                                                    <option value="5000">5000</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="number" step="0.1" class="form-control" name="sales_price" id="sales_price" placeholder="Sales Price" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="seller_notes">Seller Notes</label>
                                                <textarea class="form-control" name="seller_notes" id="seller_notes" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer text-center">
                                    <button type="submit" id="submit" class="btn btn-primary btn-md">Submit</button>
{{--                                    <a href="{{route('catalog.attributes')}}" class="btn btn-warning btn-md">Cancel</a>--}}
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@section('script')
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        window.onload = function () {
            CKEDITOR.replace('description', {
                {{--filebrowserUploadUrl: '{{ route('project.document-image-upload',['_token' => csrf_token() ]) }}',--}}
                {{--filebrowserUploadMethod: 'form'--}}
            });
        };
    </script>

@endsection
