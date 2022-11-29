@extends('admin.layouts.adminApp')


@section('content')
    @include('admin.layouts.topbar')
    @include('admin.layouts.page_loader')
    @include('admin.layouts.left_sidebar')
    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>Update Vehicle</h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-12 p-3">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                        <h6><b>successfully.</b></h6>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                                <form method="POST" action="{{route('productUpdate.store',$products[0]->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row clearfix" style="margin-top: 50px;">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Vehicle Name</label>
                                                    <input type="text" value="{{$products[0]->productName}}" class="form-control" name="productName" placeholder="Vihecle Name" required/>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Vehicle Model</label>
                                                    <input type="text" class="form-control" value="{{$products[0]->productModel}}" name="productModel" placeholder="Model" required/>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Doors</label>
                                                    <input type="text" class="form-control" value="{{$products[0]->productDoors}}" name="productDoors" placeholder="Doors" required/>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Chases Number</label>
                                                    <input type="text" value="{{$products[0]->productChases}}" class="form-control" name="productChases" placeholder="Chases Number" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="row clearfix" style="margin-top: 18px;">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Milliage</label>
                                                    <input type="text" value="{{$products[0]->productMiles}}" class="form-control" name="productMiles" placeholder="Miles" required/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label>Image</label>
                                            <input class="form-control" type="file" name="productFrontImage" required/>
                                        </div>
    
                                        <div class="col-md-3">
                                            <label>Manufacture</label>
                                            <select class="form-control show-tick" name="productCategoryId" required>
                                                @foreach ($categories as $categorie)
                                                    <option value="{{$categorie->id}}">{{$categorie->categoryName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
    
                                        <div class="col-md-3">
                                            <label>Fuel Type</label>
                                            <select class="form-control show-tick" name="productFuelTypeId" required>
                                                @foreach ($fuelTypes as $fuel)
                                                    <option value="{{$fuel->id}}">{{$fuel->fuelType}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Transmition</label>
                                            <select class="form-control show-tick" name="productTransmitionId" required>
                                                @foreach ($transmitions as $transmition)
                                                    <option value="{{$transmition->id}}">{{$transmition->transmitionName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Year</label>
                                            <select class="form-control show-tick" name="yearId" required>
                                                @foreach ($years as $yearName)
                                                    <option value="{{$yearName->id}}">{{$yearName->year}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Seats</label>
                                                    <input type="text" value="{{$products[0]->seat}}" class="form-control" name="seat" placeholder="Seat" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Engine Size</label>
                                                    <input type="text" value="{{$products[0]->engineNo}}" class="form-control" name="engineNo" placeholder="Engine No" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Price</label>
                                                    <input type="text" value="{{$products[0]->selingPrice}}" class="form-control" name="selingPrice" placeholder="Selling Price" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Vehicle Type</label>
                                            <select class="form-control show-tick" name="productTypeId" required>
                                                @foreach ($productTypes as $type)
                                                    <option value="{{$type->id}}">{{$type->productType}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Vehicle Color</label>
                                            <select class="form-control show-tick" name="color" required>
                                                @foreach ($colors as $color)
                                                    <option value="{{$color->id}}">{{$color->colorType}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Vehicle Condition</label>
                                            <select class="form-control show-tick" name="condition" required>
                                                @foreach ($conditions as $condition)
                                                    <option value="{{$condition->id}}">{{$condition->conditionName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Steering Type</label>
                                            <select class="form-control show-tick" name="steering" required>
                                                @foreach ($steerings as $steering)
                                                    <option value="{{$steering->id}}">{{$steering->steeringType}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary ">Update</button>
                                    {{-- <div class="row" style="margin-top: 50px;">
                                        <div class="col-md-6">
                                            <table class="table" id="emptbl">
                                                <tr>
                                                    <th>Vehicle Images</th>
                                                    
                                                </tr> 
                                                <div class="row">
                                                <!-- Image Section -->

                                                <div class="col-6">
                                                        
                                                    <tr> 
                                                        <td id="col0">
                                                            <input class="form-control" type="file" name="productImages[]" required/>
                                                        </td> 
                                                        </td> 
                                                    </tr>  

                                                </div>
                                

                                                </div>
                                            </table> 
                                            <div>
                                                <button type="button" class="btn btn-primary"onclick="addRows()" >Add Image</button>
                                                <button type="button" class="btn btn-danger"onclick="deleteRows()" >Delete Image</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="row" style="padding: 10px 10px" >
                                                    <button type="submit" class="btn btn-primary ">Submit</button>
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>   
    </body>
@endsection