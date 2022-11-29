@extends('layouts.app')

@section('content')
<!--========Content place===========-->
    @include('layouts.navbar')
    <div>
        <ul class="breadcrumb" style="padding-left: 50px;">
            <li class="breadcrumb-item"><a href="../index.html"><i class="fa fa-home" style="font-size: 20px"></i></a></li>
            <li class="breadcrumb-item"><a href="searchd41d.html?">Search Vehicles</a></li>
        </ul>
    </div>
    <section class="products">
        <div class="product-filters-container">
            <div class="container">
                <div class="row">
                   @include('layouts.left_sidebar')
                    <div class="vehicle-list">
        <!--===========SEARCH AREA ============-->
        <div id="search-cars-area" style="margin: 0; padding: 0">
            <div>
                <h2><i class="fa fa-search"></i>VEHICLE SEARCH</h2>
                <div id="search" class="search-cars-item-area bg-dark">
            
                    <div class="row">
                        <div class="col-md-4">
                            <label>Make</label>
                            <select name="make" id="make">
                                <option value="" selected="">All Makes</option>
                                    <option value="12">BMW</option>
                                    <option value="36">HONDA</option>
                                    <option value="74">NISSAN</option>
                                    <option value="97">SUBARU</option>
                                    <option value="102">TOYOTA</option>
                                </select>
                        </div>

                        <div class="col-md-4">
                            <label>Model</label>
                            <select name="model" id="models">
                                <option value="" selected="">All Models</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>Year</label>
                            <select name="year">
                                <option value="" selected="">All</option>
                                <option value="1980">1980</option>
                                <option value="1981">1981</option>
                                <option value="1982">1982</option>
                            </select>
                        </div>
                    </div>
            
                    <div class="row advanced-field" style="display: none;">
                        <div class="col-md-4">
                            <label>Body Type</label>
                            <select name="type">
                                <option value="">All</option>
                                <option value="1" selected="">Sedan</option><option value="2">Hatchback</option><option value="3">SUV</option><option value="4">Mini Van</option><option value="5">Van</option><option value="6">Truck</option><option value="7">Wagon</option><option value="8">Coupe</option><option value="9">Mini</option><option value="10">Bus</option><option value="11">Mini Bus</option><option value="12">Pick up</option><option value="13">Convertible</option><option value="14">Tractor</option><option value="15">Forklift</option><option value="16">Machinery</option><option value="17">Bus 20 Seats</option><option value="18">Unspecified</option><option value="19">Others</option>                    </select>
                        </div>

                        <div class="col-md-4">
                            <label>Steering</label>
                            <select name="steering">
                                <option value="">All</option>
                                <option value="left">Left Hand</option>
                                <option value="right">Right Hand</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>Year To</label>
                            <select name="year_to">
                                <option value="">All</option>
                                <option value="1980">1980</option>
                                <option value="1981">1981</option>
                                <option value="1982">1982</option>
                                <option value="1983">1983</option>
                                <option value="1984">1984</option>
                                <option value="1985">1985</option>
                                <option value="1986">1986</option>
                                <option value="1987">1987</option>
                                <option value="1988">1988</option>
                                <option value="1989">1989</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option> 
                            </select>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit">SEARCH <i class="fa fa-spinner fa-spin loading-div" style="display: none"></i></button>
                        </div>

                        <div class="col-md-6">
                            <a class="advance-search" href="#advance-search">Advanced Search</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--===========END OF SEARCH AREA ============-->
    
    
        <div class="main-search-heading-wrapper">
            <h3 class="main-search-heading">Search results</h3>
            <div class="search-filters">
                <div style="float:left; padding: 10px 30px 0 0; font-weight: bold;">Sort by</div>
                <div style="float: left">
                    <select name="sort" class="form-control" style="display: inline-block;" onchange="$('#search-form').submit();">
                        <option value="price-asc">Price low to high</option><option value="price-desc">Price high to low</option><option value="year-asc">Year low to high</option><option value="year-desc">Year high to low</option><option value="mileage-asc">Mileage low to low</option><option value="mileage-desc">Mileage high to low</option>                                </select>
                </div>
            </div>
            <div class="clear clearfix"></div>
        </div>
        @foreach ($products as $product)
        <div class="product-list">
            <div class="row mb-4" style="border-bottom: 1px solid #cccccc; padding-bottom: 20px">
                <div class="col-md-3">
                    <div class="item product" style="height: auto;">
                        <div class="product-body" style="height: auto;">
                            <a href="vehicle/2309.html">
                                <img src="{{asset('productsImages/'.$product->productFrontImage)}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <a style="text-decoration: none" href="vehicle/2309.html"><h3 style="font-weight:bold;color:#37a000">{{$product->categories->categoryName}} {{$product->productName}} {{$product->years->year}}</h3></a>
                            <table class="w-100" style="border-bottom: 1px solid #d4ab07;">
                                <tbody>
                                    <tr>
                                        <td><p><b>Mileage</b></p><p>{{number_format($product->productMiles, 0, '.', ',')}}Km</p></td>
                                        <td><p><b>Year</b></p><p>{{$product->years->year}}</p></td>
                                        <td><p><b>Engine</b></p><p>{{number_format($product->engineNo, 0, '.', ',')}}cc</p></td>
                                        <td><p><b>Transmission</b></p><p>{{$product->transmitions->transmitionName}}</p></td>
                                        <td><p><b>Condition</b></p><p>{{$product->conditions->conditionName}}</p></td>
                                    </tr>
                                </tbody>
                                <table class="w-100" style="border-bottom: 1px solid #d4ab07;">
                                    <tbody>
                                    <tr>
                                        <!--<td><p><b>Model</b></p></td><td></td>-->
                                        <td><p><b>Steering</b></p></td><td><p>{{$product->steerings->steeringType}}</p></td>
                                        <td><p><b>Fuel</b></p></td><td><p>{{$product->fuels->fuelType}}</p></td>
                                        <td><p><b>Seats</b></p></td><td><p>{{$product->seat}}</p></td>
                                    </tr>
                                    <tr>
                                        <!--<td><p><b>Engine code</b></p></td><td><p></p></td>-->
                                        <td><p><b>Chassis#</b></p></td><td><p>-</p></td>
                                        <td><p><b>Color</b></p></td><td><p>{{$product->colors->colorType}}</p></td>
                                        <td><p><b>Doors</b></p></td><td><p>5</p></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </table>
                        </div>
                    </div>
                </div>
                    
                <div class="col-md-3" style="margin-top: 60px; text-align: center">
                    <h5 style="color: #ba8b00;font-size: 23px; font-weight: bold; margin-bottom: 20px;">TZS. {{number_format($product->selingPrice, 0, '.', ',')}}/=</h5>
                    <!--<a href="/shop/vehicle/"><button class="btn-warning p-3 text-dark font-weight-bold w-100 rounded"><i class="fa fa-envelope"></i> SEND INQUIRY</button></a><p></p>-->
                    <a href="{{url('customers/product_details',$product->id)}}" class="btn btn-dark p-3 text-white font-weight-bold rounded"><i class="fa fa-shopping-cart"></i> ORDER NOW</a>
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="pagination-container" style="margin-top: 50px; margin-bottom: 50px;"></div>
        </div> 
        @endforeach
        <div class="pagination-container">
            {{$products->links()}}
        </div>
    </section>

    <!--======footer=======-->
    @include('layouts.footer_section')
@endsection