@extends('admin.layouts.app')
@section('title', 'Edit Car')
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
                                <h3 class="card-title">Edit Car</h3>
                            </div>
                            <form class="attribute-form" method="post" action="{{ route('admin.cars.update',$id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required value="{{$car->title}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="location" id="location" required class="form-control">
                                                    <option value="">Location</option>
                                                    @foreach($locations as $location)
                                                        <option value="{{$location->name}}" {!! $car->location == $location->name ? 'selected' : '' !!}>{{$location->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="condition" id="condition" required class="form-control">
                                                    <option value="">Condition</option>
                                                    <option value="Like New" {{$car->condition == "Like New" ? 'selected' : ''}}>Like New</option>
                                                    <option value="New" {{$car->condition == "New" ? 'selected' : ''}}>New</option>
                                                    <option value="Used" {{$car->condition == "Used" ? 'selected' : ''}}>Used</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="make_id" id="make_id" class="form-control" required>
                                                    <option value="">Make</option>
                                                    @foreach($makes as $make)
                                                        <option value="{{$make->id}}" {{$car->make_id == $make->id ? 'selected' : ''}}>{{$make->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="model_id" id="model_id" class="form-control" required>
                                                    <option value="">Model</option>
{{--                                                    @foreach($models as $model)--}}
{{--                                                        <option value="{{$model->id}}" {{$car->model_id == $model->id ? 'selected' : ''}} hidden>{{$model->name}}</option>--}}
{{--                                                    @endforeach--}}
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="mileage" id="mileage" placeholder="Mileage"value=" {{$car->mileage}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="year" class="form-control" name="year" id="year" placeholder="Year" value="{{$car->year}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="exterior_color" id="exterior_color" placeholder="Exterior Color" value="{{$car->exterior_color}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="fuel_type" id="fuel_type" class="form-control" required>
                                                    <option value="">Fuel Type</option>
                                                    <option value="Diesel" {{$car->condition == "Diesel" ? 'selected' : ''}}>Diesel</option>
                                                    <option value="Ethanol" {{$car->condition == "Ethanol" ? 'selected' : ''}}>Ethanol</option>
                                                    <option value="Electric" {{$car->condition == "Electric" ? 'selected' : ''}}>Electric</option>
                                                    <option value="Fuel" {{$car->condition == "Fuel" ? 'selected' : ''}}>Fuel</option>
                                                    <option value="Gasoline" {{$car->condition == "Gasoline" ? 'selected' : ''}}>Gasoline</option>
                                                    <option value="Hybrid" {{$car->condition == "Hybrid" ? 'selected' : ''}}>Hybrid</option>
                                                    <option value="LPG Autogas" {{$car->condition == "LPG Autogas" ? 'selected' : ''}}>LPG Autogas</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="transmission" id="transmission" class="form-control" required>
                                                    <option value="">Transmission</option>
                                                    <option value="Automatic" {{$car->condition == "Automatic" ? 'selected' : ''}}>Automatic</option>
                                                    <option value="Manual" {{$car->condition == "Manual" ? 'selected' : ''}}>Manual</option>
                                                    <option value="Semi-automatic" {{$car->condition == "Semi-automatic" ? 'selected' : ''}}>Semi-automatic</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="steering" id="steering" class="form-control">
                                                    <option value="">Steering</option>
                                                    <option value="LHD" {{$car->condition == "LHD" ? 'selected' : ''}}>LHD</option>
                                                    <option value="RHD" {{$car->condition == "RHD" ? 'selected' : ''}}>RHD</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="drive" id="drive" class="form-control">
                                                    <option value="">Drive</option>
                                                    <option value="FWD" {{$car->condition == "FWD" ? 'selected' : ''}}>FWD</option>
                                                    <option value="RWD" {{$car->condition == "RWD" ? 'selected' : ''}}>RWD</option>
                                                    <option value="AWD" {{$car->condition == "AWD" ? 'selected' : ''}}>AWD</option>
                                                    <option value="4WD" {{$car->condition == "4WD" ? 'selected' : ''}}>4WD</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="engine" id="engine" class="form-control">
                                                    <option value="">Engine</option>
                                                    <option value="1000" {{$car->condition == "1000" ? 'selected' : ''}}>1000</option>
                                                    <option value="1500" {{$car->condition == "1500" ? 'selected' : ''}}>1500</option>
                                                    <option value="2000" {{$car->condition == "2000" ? 'selected' : ''}}>2000</option>
                                                    <option value="4000" {{$car->condition == "4000" ? 'selected' : ''}}>4000</option>
                                                    <option value="5000" {{$car->condition == "5000" ? 'selected' : ''}}>5000</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="number" step="0.1" class="form-control" name="sales_price" id="sales_price" placeholder="Sales Price" value="{{$car->sales_price}}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="seller_notes" id="" cols="30" rows="10">
                                                    {!! $car->seller_notes ?? '' !!}
                                                </textarea>
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

    <script>
        $(document).ready(function () {
            $('#location').select2();
            $('#condition').select2();
            $('#make_id').select2();
            $('#model_id').select2();
            $('#fuel_type').select2();
            $('#transmission').select2();
            $('#steering').select2();
            $('#drive').select2();
            $('#engine').select2();


            setTimeout(() => {
                $('#make_id').trigger('change.select2');

                $('#model_id').val('{{$car->model_id}}');
                $('#model_id').trigger('change.select2');

                $('#fuel_type').val('{{$car->fuel_type}}');
                $('#fuel_type').trigger('change.select2');

                $('#transmission').val('{{$car->transmission}}');
                $('#transmission').trigger('change.select2');

                $('#steering').val('{{$car->steering}}');
                $('#steering').trigger('change.select2');

                $('#drive').val('{{$car->drive}}');
                $('#drive').trigger('change.select2');

                $('#engine').val('{{$car->engine}}');
                $('#engine').trigger('change.select2');
            }, 2000);

            {{--let models = "{{$models}}";--}}
            let models = JSON.parse("{{$models}}".replaceAll('&quot;', '"'));

            $('#make_id').on('change.select2', function () {
                $('#model_id').html('<option value="">Model</option>');

                models.forEach((model) => {
                    $('#model_id').append(model.make_id == $(this).val() ? '<option value="'+model.id+'">'+model.name+'</option>' : '');
                });

                $('#model_id').select2('destroy');
                $('#model_id').select2();
            });
        });
    </script>

@endsection
