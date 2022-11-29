@extends('admin.layouts.adminApp')

@section('content')
    @include('admin.layouts.topbar')
    @include('admin.layouts.left_sidebar')

    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <span style="font-size: 25px;"><b>{{$products[0]->years->year}} {{$products[0]->productName}}</b></span>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{asset('productsImages/'.$products[0]->productFrontImage)}}" alt="" style="width: 250px;"/>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <table class="table table-bordered">
                                            <thead>
                                                <th>Milliage</th>
                                                <th>Year</th>
                                                <th>Engine</th>
                                                <th>Transmition</th>
                                                <th>Condition</th>
                                                <th>Color</th>
                                                <th>Seat</th>
                                                <th>Type</th>
                                                <th>Door</th>
                                                <th>Model</th>
                                                <th>Chases No</th>
                                                <th>Fuel Type</th>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>{{$products[0]->productMiles}} KM</td>
                                                    <td>{{$products[0]->years->year}}</td>
                                                    <td>{{$products[0]->engineNo}} CC</td>
                                                    <td>{{$products[0]->transmitions->transmitionName}}</td>
                                                    <td>{{$products[0]->conditions->conditionName}}</td>
                                                    <td>{{$products[0]->colors->colorType}}</td>
                                                    <td>{{$products[0]->seat}}</td>
                                                    <td>{{$products[0]->types->productType}}</td>
                                                    <td>{{$products[0]->productDoors}}</td>
                                                    <td>{{$products[0]->productModel}}</td>
                                                    <td>{{$products[0]->productChases}}</td>
                                                    <td>{{$products[0]->fuels->fuelType}}</td>
                                                </tr>
                                            </tbody>
                                        </table>    
                                        <div style="margin-top: 50px;">
                                            <span style="font-size: 20px;"><b>Selling Price:</b> {{number_format($products[0]->selingPrice, 0, '.', ',')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>   
    </body>
@endsection