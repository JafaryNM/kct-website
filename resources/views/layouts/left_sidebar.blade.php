<div class="sidebar-left">
    <h3>Shop by make</h3>
    @foreach ($categories as $category)
        <div class="sidebar-menu">
            <a  href="{{url('customers/searchby_categories', $category->id)}}"><i class="fa fa-arrow-right"></i>{{$category->categoryName}}</a>
        </div>
    @endforeach
    <h3>Shop by type</h3>
    <div class="sidebar-menu">
        <div class="sidebar-menu">
            @foreach ($types as $type)
            <a href="{{url('type', $type->id)}}"><i class="fa fa-arrow-right"></i>{{$type->productType}}</a>
            @endforeach
        </div>
    </div>
    <h3>Shop by price</h3>
    <div class="sidebar-menu">
        @foreach ($products as $product)
            <a href="{{url('prices',$product->id)}}"><i class="fa fa-arrow-right"></i> {{number_format($product->selingPrice, 0, '.', ',') }}</a>
        @endforeach
    </div>
</div>