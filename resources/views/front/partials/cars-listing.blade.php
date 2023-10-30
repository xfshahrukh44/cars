<div class='stm-row'>
    @foreach($cars as $car)
        <div class="ulisting-item-list none stm-col-12">

            <div class=" ulisting_element_470_1580552099500 ulisting_element_470_1580552099500" >

                <div class=" stm-row  ulisting_element_250_1580552099500">

                    <div class=" stm-col  stm-col-xl-3 stm-col-lg-3 stm-col-md-4 stm-col-sm-12 stm-col-12 ulisting_element_120_1580552099500" >
                        <div class='ulisting-thumbnail-panel'>
                            <a href="{{route('front.carDetail', $car->id)}}" class="ulisting-thumbnail-box-link"></a>
                            <div style=" background-image: url('{{$car->feature_image()}}');
                                background-repeat: no-repeat;
                                background-position: center center;
                                background-size: cover;" data-id="3022"class=" ulisting-thumbnail-box ulisting_element_90_1580553840035">
                                <div class='ulisting-thumbnail-panel-top'>
                                    <div class=" ulisting_element_330_1580553844994" >
                                        <span class="ulisting-listing-photo-count"><i class="fa fa-camera"></i> {{$car->car_images()->count()}} </span>
                                    </div>

                                </div> <div class='ulisting-thumbnail-panel-bottom'>
                                    <div class=" ulisting_element_880_1583818157786" >
                                        <div class="ulisting_listing-compare">
                                            <span data-compare_id='[3022]' class='ulisting-listing-compare'> <i onclick='add_listing_compare_via_class(3022)' id='ulisting_listing_compare_3022' class='ulisting_listing_compare_3022 fa fa-compress '></i> </span> 		</div>
                                    </div>

                                    <div class=" ulisting_element_640_1583818160906" >
                                        <span data-wishlist_id="3022" onclick="ulisting_wishlist(3022)"  class="ulisting-listing-wishlist stm-cursor-pointer ulisting_wishlist_3022  "> <i class="fa fa-heart"></i></span> <span class="ulisting_wishlist_load_3022 ulisting-listing-wishlist-beat hidden"><i class="fa fa-heart ld ld-heartbeat"></i></span> </div>
                                </div><div class="stm-top-badge">Featured</div></div></div>


                    </div>

                    <div class=" stm-col  stm-col-xl-9 stm-col-lg-9 stm-col-md-8 stm-col-sm-12 stm-col-12 ulisting_element_160_1580553778566" >
                        <div class=" stm-row ulisting_element_630_1580553857177">
                            <div class=" stm-col  stm-col-xl-10 stm-col-lg-10 stm-col-md-10 stm-col-sm-12 stm-col-12 ulisting_element_520_1580553857177" >
                                <div class="ulisting-attribute-box ulisting_element_120_1582696518500">
                                    <div style="width: 100%">
                                        <div class=" ulisting_element_180_1582696528130">

                                            <div class='attribute_style attribute_style_4'>
                                                <div class='attribute-parts-wrap'>
                                                    {{--//condition--}}
                                                    <div class='attribute-value heading-font'>{{$car->condition ?? ''}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width: 100%">
                                        <div class=" ulisting_element_350_1582696531806">

                                            <div class='attribute_style attribute_style_4'>
                                                <div class='attribute-parts-wrap'>
                                                    {{--//year--}}
                                                    <div class='attribute-value heading-font'>{{$car->year ?? ''}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" ulisting_element_220_1580553977879">
                                    {{--//title--}}
                                    <a class="item-ulisting-title heading-font" href="{{route('front.carDetail', $car->id)}}">
                                        {!! $car->title ?? '' !!}
                                    </a>
                                </div>
                            </div>

                            <div class=" stm-col  stm-col-xl-2 stm-col-lg-2 stm-col-md-2 stm-col-sm-12 stm-col-12 ulisting_element_230_1580553888703" >
                                <div class="item-price heading-font ">
                                    <div class=" ulisting_element_400_1581397829790">
                                        <div class='ulisting-listing-price'>
                                            <span class='ulisting-listing-price-new'>
                                                {{$car->sales_price ? ('$'.number_format($car->sales_price)) : ''}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ulisting-attribute-box ulisting_element_10_1580553921434">
                            @if ($car->mileage)
                                <div style="width: 25%">
                                    <div class=" ulisting_element_190_1580554483846">

                                        <div class='attribute_style attribute_style_5'>
                                            <div class='attribute-icon'>

                                            </div>
                                            <div class='attribute-parts-wrap'>
                                                {{--//mileage--}}
                                                <div class='attribute-name'>Mileage</div>
                                                <div class='attribute-value'>{{$car->mileage}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($car->fuel_type)
                                <div style="width: 25%">
                                    <div class=" ulisting_element_560_1580554495257">

                                        <div class='attribute_style attribute_style_5'>
                                            <div class='attribute-icon'>

                                            </div>
                                            <div class='attribute-parts-wrap'>
                                                {{--//fuel_type--}}
                                                <div class='attribute-name'>Fuel Type</div>
                                                <div class='attribute-value'>{{$car->fuel_type ?? ''}}</div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            @endif
                            @if ($car->engine)
                                <div style="width: 25%">
                                    <div class=" ulisting_element_310_1580554506896">

                                        <div class='attribute_style attribute_style_5'>
                                            <div class='attribute-icon'>
                                                <i class='fa fa-car'></i>
                                            </div>
                                            <div class='attribute-parts-wrap'>
                                                {{--//engine--}}
                                                <div class='attribute-name'>Engine</div>
                                                <div class='attribute-value'>{{$car->engine ?? ''}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($car->transmission)
                                <div style="width: 25%">
                                    <div class=" ulisting_element_810_1580554510721">

                                        <div class='attribute_style attribute_style_5'>
                                            <div class='attribute-icon'>

                                            </div>
                                            <div class='attribute-parts-wrap'>
                                                {{--//transmission--}}
                                                <div class='attribute-name'>Transmission</div>
                                                <div class='attribute-value'>{{$car->transmission ?? ''}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class=" stm-row ulisting_element_50_1582786382225">
                            <div class=" stm-col  stm-col-xl-0 stm-col-lg-0 stm-col-md-0 stm-col-sm-0 stm-col-0 ulisting_element_360_1582786382225" >

                                <div class="stm-dealer-info-wrap">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{$cars->links()}}
</div>
