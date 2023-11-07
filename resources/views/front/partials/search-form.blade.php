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

@php
    $years = [];
    for ($i = 2024; $i > 1984; $i--) {
        $years []= strval($i);
    }
@endphp

<div class="row m-auto" style="padding: 10px; background-color: #ecf1f8; padding-top: 24px;">
    <div class="col-md-12">
        <form action="{{route('front.search')}}" method="GET">
            @csrf
            <div class="row m-auto">
                <h1 style="font-size: 130%;">SEARCH OPTIONS</h1>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <input class="form-control" type="text" id="search" name="title" value="{{$filters['title']}}" placeholder="Search" style="max-height: 34px;">
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
                    <select class="form-control" id="body_type" name="body_type" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Body Type</option>
                        <option value="Sedan" {!! $filters['transmission'] == "Sedan" ? 'selected' : '' !!}>Sedan</option>
                        <option value="Coupe" {!! $filters['transmission'] == "Coupe" ? 'selected' : '' !!}>Coupe</option>
                        <option value="Hatchback" {!! $filters['transmission'] == "Hatchback" ? 'selected' : '' !!}>Hatchback</option>
                        <option value="Station Wagon" {!! $filters['transmission'] == "Station Wagon" ? 'selected' : '' !!}>Station Wagon</option>
                        <option value="SUV" {!! $filters['transmission'] == "SUV" ? 'selected' : '' !!}>SUV</option>
                        <option value="Pickup" {!! $filters['transmission'] == "Pickup" ? 'selected' : '' !!}>Pickup</option>
                        <option value="Van" {!! $filters['transmission'] == "Van" ? 'selected' : '' !!}>Van</option>
                        <option value="Mini Van" {!! $filters['transmission'] == "Mini Van" ? 'selected' : '' !!}>Mini Van</option>
                        <option value="Wagon" {!! $filters['transmission'] == "Wagon" ? 'selected' : '' !!}>Wagon</option>
                        <option value="Convertible" {!! $filters['transmission'] == "Convertible" ? 'selected' : '' !!}>Convertible</option>
                        <option value="Bus" {!! $filters['transmission'] == "Bus" ? 'selected' : '' !!}>Bus</option>
                        <option value="Truck" {!! $filters['transmission'] == "Truck" ? 'selected' : '' !!}>Truck</option>
                        <option value="Heavy Equipment" {!! $filters['transmission'] == "Heavy Equipment" ? 'selected' : '' !!}>Heavy Equipment</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="transmission" name="transmission" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Transmission</option>
                        <option value="Automatic" {!! $filters['transmission'] == "Automatic" ? 'selected' : '' !!}>Automatic</option>
                        <option value="Manual" {!! $filters['transmission'] == "Manual" ? 'selected' : '' !!}>Manual</option>
                        <option value="Semi-Automatic" {!! $filters['transmission'] == "Semi-Automatic" ? 'selected' : '' !!}>Semi-Automatic</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="fuel_type" name="fuel_type" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Fuel Type</option>
                        <option value="Diesel" {!! $filters['fuel_type'] == "Diesel" ? 'selected' : '' !!}>Diesel</option>
                        <option value="Ethanol" {!! $filters['fuel_type'] == "Ethanol" ? 'selected' : '' !!}>Ethanol</option>
                        <option value="Electric" {!! $filters['fuel_type'] == "Electric" ? 'selected' : '' !!}>Electric</option>
                        <option value="Fuel" {!! $filters['fuel_type'] == "Fuel" ? 'selected' : '' !!}>Fuel</option>
                        <option value="Gasoline" {!! $filters['fuel_type'] == "Gasoline" ? 'selected' : '' !!}>Gasoline</option>
                        <option value="Hybrid" {!! $filters['fuel_type'] == "Hybrid" ? 'selected' : '' !!}>Hybrid</option>
                        <option value="LPG Autogas" {!! $filters['fuel_type'] == "LPG Autogas" ? 'selected' : '' !!}>LPG Autogas</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="drive" name="drive" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Drive</option>
                        <option value="FWD" {!! $filters['drive'] == "FWD" ? 'selected' : '' !!}>FWD</option>
                        <option value="RWD" {!! $filters['drive'] == "RWD" ? 'selected' : '' !!}>RWD</option>
                        <option value="AWD" {!! $filters['drive'] == "AWD" ? 'selected' : '' !!}>AWD</option>
                        <option value="4WD" {!! $filters['drive'] == "4WD" ? 'selected' : '' !!}>4WD</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="steering" name="steering" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Steering</option>
                        <option value="LHD" {!! $filters['steering'] == "LHD" ? 'selected' : '' !!}>LHD</option>
                        <option value="RHD" {!! $filters['steering'] == "RHD" ? 'selected' : '' !!}>RHD</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="year_from" name="year_from" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Year From</option>
                        @foreach($years as $year)
                            <option value="{{$year}}" {!! $filters['year_from'] == $year ? 'selected' : '' !!}>{{$year}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="year_to" name="year_to" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Year To</option>
                        @foreach($years as $year)
                            <option value="{{$year}}" {!! $filters['year_to'] == $year ? 'selected' : '' !!}>{{$year}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="condition" name="condition" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Condition</option>
                        <option value="Like New" {!! $filters['condition'] == "Like New" ? 'selected' : '' !!}>Like New</option>
                        <option value="New" {!! $filters['condition'] == "New" ? 'selected' : '' !!}>New</option>
                        <option value="Used" {!! $filters['condition'] == "Used" ? 'selected' : '' !!}>Used</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="location" name="location" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Location</option>
                        @foreach($locations as $location)
                            <option value="{{$location->name}}" {!! $filters['location'] == $location->name ? 'selected' : '' !!}>{{$location->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="engine" name="engine" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Engine</option>
                        <option value="1000" {!! $filters['engine'] == "1000" ? 'selected' : '' !!}>1000</option>
                        <option value="1500" {!! $filters['engine'] == "1500" ? 'selected' : '' !!}>1500</option>
                        <option value="2000" {!! $filters['engine'] == "2000" ? 'selected' : '' !!}>2000</option>
                        <option value="3000" {!! $filters['engine'] == "3000" ? 'selected' : '' !!}>3000</option>
                        <option value="4000" {!! $filters['engine'] == "4000" ? 'selected' : '' !!}>4000</option>
                        <option value="5000" {!! $filters['engine'] == "5000" ? 'selected' : '' !!}>5000</option>
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
        jQuery('#year_from').select2({theme: 'bootstrap'});
        jQuery('#year_to').select2({theme: 'bootstrap'});
        jQuery('#condition').select2({theme: 'bootstrap'});
        jQuery('#make_id').select2({theme: 'bootstrap'});
        jQuery('#model_id').select2({theme: 'bootstrap'});
        jQuery('#body_type').select2({theme: 'bootstrap'});
        jQuery('#transmission').select2({theme: 'bootstrap'});
        jQuery('#drive').select2({theme: 'bootstrap'});
        jQuery('#steering').select2({theme: 'bootstrap'});
        jQuery('#fuel_type').select2({theme: 'bootstrap'});
        jQuery('#engine').select2({theme: 'bootstrap'});

        setTimeout(() => {
            jQuery('#make_id').trigger('change.select2');

            jQuery('#location').val('{{$filters['location']}}');
            jQuery('#location').trigger('change.select2');

            jQuery('#year_from').val('{{$filters['year_from']}}');
            jQuery('#year_from').trigger('change.select2');

            jQuery('#year_to').val('{{$filters['year_to']}}');
            jQuery('#year_to').trigger('change.select2');

            jQuery('#condition').val('{{$filters['condition']}}');
            jQuery('#condition').trigger('change.select2');

            jQuery('#make_id').val('{{$filters['make_id']}}');
            jQuery('#make_id').trigger('change.select2');

            jQuery('#model_id').val('{{$filters['model_id']}}');
            jQuery('#model_id').trigger('change.select2');

            jQuery('#body_type').val('{{$filters['body_type']}}');
            jQuery('#body_type').trigger('change.select2');

            jQuery('#transmission').val('{{$filters['transmission']}}');
            jQuery('#transmission').trigger('change.select2');

            jQuery('#steering').val('{{$filters['steering']}}');
            jQuery('#steering').trigger('change.select2');

            jQuery('#drive').val('{{$filters['drive']}}');
            jQuery('#drive').trigger('change.select2');

            jQuery('#fuel_type').val('{{$filters['fuel_type']}}');
            jQuery('#fuel_type').trigger('change.select2');

            jQuery('#engine').val('{{$filters['engine']}}');
            jQuery('#engine').trigger('change.select2');
        }, 100);

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
