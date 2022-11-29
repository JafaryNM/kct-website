<div role="tabpanel" class="tab-pane fade in active" id="products">
    <div class="row">
        <div class="col-md-10">
            <h5>Vihecles List</h5>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#largeModal">Add Vihecle</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Doors</th>
                    <th>Chases</th>
                    <th>Color</th>
                    <th>Condition</th>
                    <th>Price</th>
                    <th>Miles</th>
                    <th>Transmition</th>
                    <th>Seat</th>
                    <th>Engine</th>
                    <th>Year</th>
                    <th>Fuel Type</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)  
                <tr>
                    <td>{{$product->productName}}</td>
                    <td>{{$product->productModel}}</td>
                    <td>{{$product->productDoors}}</td>
                    <td>{{$product->productChases}}</td>
                    <td>{{$product->colors->colorType}}</td>
                    <td>{{$product->conditions->conditionName}}</td>
                    <td>{{$product->selingPrice}}</td>
                    <td>{{$product->productMiles}}</td>
                    <td>{{$product->transmitions->transmitionName}}</td>
                    <td>{{$product->seat}}</td>
                    <td>{{$product->years->year}}</td>
                    <td>{{$product->engineNo}}</td>
                    <td>{{$product->fuels->fuelType}}</td>
                    <td>
                        <a href="{{url('admins/product/view',$product->id)}}"><button class="btn btn-primary">View</button></a>
                    </td>
                    <td>
                        <a href="{{url('admins/product/edit',$product->id)}}"><button class="btn btn-primary">Edit</button></a>
                    </td>
                    <td>
                        <a href="{{url('admins/product/delete', $product->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>