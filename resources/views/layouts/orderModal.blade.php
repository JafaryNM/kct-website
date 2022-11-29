<form action="{{route('customers.createInvoice')}}" method="POST">
     <!-- hidden inputs -->
     <input type="text" value="{{$products[0]->productName}}" name="productName" hidden/>
     <input type="text" value="{{$products[0]->categories->categoryName}}" name="categoryName" hidden/>
     <input type="text" value="{{$products[0]->years->year}}" name="year" hidden/>
     <input type="text" value="{{$products[0]->selingPrice}}" name="sellingPrice" hidden/>
     <input type="text" value="{{$products[0]->productFrontImage}}" name="productImage" hidden/>
     <input type="text" value="{{$products[0]->engineNo}}" name="engineNo" hidden/>
     <input type="text" value="{{$products[0]->productMiles}}" name="milles" hidden/>
     <input type="text" value="{{$products[0]->colors->colorType}}" name="color" hidden/>
    @csrf
    <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Plece Your Order Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <h5>Customer Details</h5>
                <div style="margin-top: 20px;">
                    @if (Auth::check())
                        @include('layouts.logedInorderForm') 
                    @else
                    @include('layouts.logedOutOrderForm') 
                    @endif
                </div>
                <h5>Vihecle Details</h5>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-2">
                        <span><b>Photo</b></span>
                    </div>
                    <div class="col-md-2">
                        <span><b>Make</b></span>
                    </div>
                    <div class="col-md-2">
                        <span><b>Year</b></span>
                    </div>
                    <div class="col-md-2">
                        <span><b>Brand</b></span>
                    </div>
                    <div class="col-md-2">
                        <span><b>Miliage</b></span>
                    </div>
                    <div class="col-md-2">
                        <span><b>Fuel Type</b></span>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2">
                        <img src="{{asset('productsImages/'.$products[0]->productFrontImage)}}" style="width: 50px;"/>
                    </div>
                    <div class="col-md-2">
                        <span>{{$products[0]->productName}}</span>
                    </div>
                    <div class="col-md-2">
                        <span>{{$products[0]->years->year}} </span>
                    </div>
                    <div class="col-md-2">
                        <span>{{$products[0]->categories->categoryName}}</span>
                    </div>
                    <div class="col-md-2">
                        <span>{{number_format($products[0]->productMiles, 0, '.', ',')}}</span>
                    </div>
                    <div class="col-md-2">
                        <span>{{$products[0]->fuels->fuelType}}</span>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2">
                        <span><b>Transmission</b></span>
                    </div>
                    <div class="col-md-2">
                        <span><b>Seats</b></span>
                    </div>
                    <div class="col-md-2">
                        <span><b>Engine</b></span>
                    </div>
                    <div class="col-md-2">
                        <span><b>Price</b></span>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2">
                        <span>{{$products[0]->transmitions->transmitionName}}</span>
                    </div>
                    <div class="col-md-2">
                        <span>{{$products[0]->seat}}</span>
                    </div>
                    <div class="col-md-2">
                        <span>{{$products[0]->engineNo}} CC</span>
                    </div>
                    <div class="col-md-2">
                        <span>{{number_format($products[0]->selingPrice, 0, '.', ',')}}</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Order</button>
            </div>
        </div>
        </div>
    </div>
</form>