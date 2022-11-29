@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<!-- Main User Dashbord-->
<section class="products">
    <div class="container-fluid">
            <div class="product-list">
                <div class="row">
                    <div class="col-md-2">
                    <div class="sidebar-left-1 m-2">
            <h3>Menu</h3>
            <div class="sidebar-menu-1">
                <a href="{{url('customers/profile')}}">Invoices</a>
                <a href="{{url('customers/get_inqueries')}}">Inquiries</a>
                <a href="/account/shipping">Delivery Address</a>
                <a href="/account/favourites">Favourites</a>
                <a href="/account/profile">Profile</a>
                <a href="{{url('customers/logout')}}">Logout</a>
            </div>
        </div>              
    </div>

    <div class="col-md-10">
        <div class="products-t t-s">
            <h3>Inquiries</h3>
            @if(session()->has('success'))
                <div class="alert alert-success mt-3">
                <h6><b>successfully.</b></h6>
                </div>
            @endif
            </div>
                    <div class="table-container">
                        <table cellpadding="6" cellspacing="1" style="width:100%" border="0" class="ssj-table">
                            <thead>
                            <tr>
                                <th style="width: 10%;">Photo</th>
                                <th style="width: 15%;">Make/Model/Year</th>
                                <th style="width: 15%;">Inquiry #</th>
                                <th style="width: 10%;">Total Price</th>
                                <th style="width: 15%;">Date/Time</th>
                                <th style="width: 15%;">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($customerInquiries as $inquiry)
                                    <tr>
                                        <td><img src="{{asset('productsImages/'.$inquiry->productImage)}}" style="width: 150px;"></td>
                                        <td>{{$inquiry->productName}} {{$inquiry->category}} {{$inquiry->year}}<br>
                                        </td>
                                        <td>KCT/{{date("Y")}}/{{$inquiry->id}}</td>
                                        <td>TZS. {{number_format($inquiry->sellingPrice, 0, '.', ',')}}</td>
                                        <td>{{$inquiry->created_at}}</td>
                                        <td>
                                            <a href="{{url('customers/delete_inquiry',$inquiry->id)}}"><button class="btn btn-danger btn-sm">Delete</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('layouts.footer_section')
@endsection
