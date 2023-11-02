<style>
    /* Style inputs */
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    /* Style the submit button */
    input[type=submit] {
        width: 100%;
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Add a background color to the submit button on mouse-over */
    input[type=submit]:hover {
        background-color: #45a049;
    }

    select {
        opacity: 100 !important;
        visibility: inherit !important;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{--<style>--}}
{{--    .select2-container--default .select2-selection--single {--}}
{{--        height: 38px !important;--}}
{{--    }--}}

{{--    table.dataTable thead th, table.dataTable thead td {--}}
{{--        border-bottom: 0px;--}}
{{--    }--}}

{{--    table.dataTable.no-footer {--}}
{{--        border-bottom: 1px solid #dee2e6;--}}
{{--    }--}}

{{--    #example1_filter input {--}}
{{--        border-color: #f2f2f2;--}}
{{--    }--}}

{{--</style>--}}

<div class="row m-auto" style="padding: 10px; background-color: #ecf1f8; padding-top: 24px;">
    <div class="col-md-12">
        <form action="{{route('front.search')}}" method="GET">
            @csrf
            <div class="row m-auto">
                <h1 style="font-size: 130%;">SEARCH OPTIONS</h1>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <input class="form-control" type="text" id="search" name="title" placeholder="Search" style="max-height: 34px;">
                </div>
                <div class="col-md-3 form-group">
                    <input class="form-control" type="text" id="year" name="year" placeholder="Year" style="max-height: 34px;">
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="condition" name="condition" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Condition</option>
                        <option value="Like New">Like New</option>
                        <option value="New">New</option>
                        <option value="Used">Used</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="make_id" name="make_id" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Make</option>
                        @foreach($makes as $make)
                            <option value="{{$make->id}}">{{$make->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="model_id" name="model_id" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Model</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="transmission" name="transmission" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Transmission</option>
                        <option value="Automatic">Automatic</option>
                        <option value="Manual">Manual</option>
                        <option value="Semi-Automatic">Semi-Automatic</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="steering" name="steering" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Steering</option>
                        <option value="LHD">LHD</option>
                        <option value="RHD">RHD</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="fuel_type" name="fuel_type" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Fuel Type</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Ethanol">Ethanol</option>
                        <option value="Electric">Electric</option>
                        <option value="Fuel">Fuel</option>
                        <option value="Gasoline">Gasoline</option>
                        <option value="Hybrid">Hybrid</option>
                        <option value="LPG Autogas">LPG Autogas</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="location" name="location" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Location</option>
                        @foreach($locations as $location)
                            <option value="{{$location->name}}">{{$location->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="engine" name="engine" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Engine</option>
                        <option value="1000">1000</option>
                        <option value="1500">1500</option>
                        <option value="2000">2000</option>
                        <option value="3000">3000</option>
                        <option value="4000">4000</option>
                        <option value="5000">5000</option>
                    </select>
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit">Search</button>
                </div>
            </div>


        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {

        jQuery('#location').select2({theme: 'bootstrap'});
        jQuery('#condition').select2({theme: 'bootstrap'});
        jQuery('#make_id').select2({theme: 'bootstrap'});
        jQuery('#model_id').select2({theme: 'bootstrap'});
        jQuery('#transmission').select2({theme: 'bootstrap'});
        jQuery('#steering').select2({theme: 'bootstrap'});
        jQuery('#fuel_type').select2({theme: 'bootstrap'});
        jQuery('#engine').select2({theme: 'bootstrap'});

        {{--let models = "{{$models}}";--}}
        let models = JSON.parse("{{$models}}".replaceAll('&quot;', '"'));

        jQuery('#make_id').on('change.select2', function () {
            jQuery('#model_id').html('<option value="">Model</option>');

            models.forEach((model) => {
                jQuery('#model_id').append(model.make_id == jQuery(this).val() ? '<option value="'+model.id+'">'+model.name+'</option>' : '');
            });

            jQuery('#model_id').select2('destroy');
            jQuery('#model_id').select2({theme: 'bootstrap'});
        });
    });
</script>
