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

<div class="row m-auto" style="padding: 10px; background-color: #ecf1f8; padding-top: 24px;">
    <div class="col-md-12">
        <form action="/action_page.php">
            <div class="row m-auto">
                <h1 style="font-size: 130%;">SEARCH OPTIONS</h1>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <input class="form-control" type="text" id="search" name="search" placeholder="Search">
                </div>
                <div class="col-md-3 form-group">
                    <input class="form-control" type="text" id="year" name="year" placeholder="Year">
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="condition" name="condition" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Condition</option>
                        <option value="New">New</option>
                        <option value="Used">Used</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="model" name="model" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Model</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <select class="form-control" id="make" name="make" style="opacity: 100 !important; visibility: inherit !important;">
                        <option value="">Make</option>
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
                    <select class="form-control" id="transmission" name="transmission" style="opacity: 100 !important; visibility: inherit !important;">
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

<script>
    $(document).ready(function () {
        alert('here');
    });
</script>
