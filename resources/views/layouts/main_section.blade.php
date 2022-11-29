<div class="vehicle-list-home">
    <h3 class="main-heading">Latest Vehicles</h3>
    <div class="product-list">
        <div class="row list">
            @foreach ($products as $product)
                <div class="col-md-4 col-sm-4" style="margin-bottom: 20px;">
                    <div class="item product">
                        <div class="product-body">
                            <a href="{{url('customers/product_details',$product->id)}}">
                                <img src="{{asset('productsImages/'.$product->productFrontImage)}}" alt="" />
                            </a>
                        </div>

                        <div class="product-footer">
                            <h2> {{$product->categories->categoryName}} {{$product->productName}} <span>{{$product->years->year}}</span></h2>
                        </div>

                        <div class="product-detail-1">
                            <span>{{number_format($product->productMiles, 0, '.', ',')}} km</span>
                            <span>{{$product->years->year}} req</span>
                        </div>

                        <p class="price"><span>Tsh {{number_format($product->selingPrice, 0, '.', ',')}}</span></p>

                        <div class="product-link">
                            <a href="{{url('customers/product_details',$product->id)}}">
                                View Vehicle
                            </a>
                        </div>
                    </div>
                </div>  
            @endforeach

            <div style="clear: both; width: 100%;"></div>

            <div class="pagination-container">
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>