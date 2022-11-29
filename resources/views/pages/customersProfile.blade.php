@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<!-- Main User Dashbord-->
<section class="products">
    <div class="container">
        @include('layouts.customerProfileLeftNavbar')       
    </div>

    <div class="col-md-10">
        <div class="products-t t-s">
            <h3>Invoices</h3>
            @if(session()->has('success'))
                <div class="alert alert-success">
                <h6><b>successfully.</b></h6>
                </div>
            @endif
            <div class="table-container mt-3">
                <table cellpadding="6" cellspacing="1" style="width:100%" border="0" class="ssj-table">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Make/Model/Year</th>
                        <th>Order #</th>
                        <th>Total Price</th>
                        <th>Date/Time</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Attachment</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($customerIvoice as $invoice)
                            <tr>
                                <td><img src="{{asset('productsImages/'.$invoice->productImage)}}" style="width: 150px;"></td>
                                <td>{{$invoice->productName}} {{$invoice->category}} {{$invoice->year}}<br>
                                </td>
                                <td>KCT/{{date("Y")}}/{{$invoice->id}}</td>
                                <td>TZS. {{number_format($invoice->sellingPrice, 0, '.', ',')}}</td>
                                <td>{{$invoice->created_at}}</td>
                                <td>{{$invoice->status}}</td>
                                <td>
                                    <a href="{{url('customers/view_invoice',$invoice->id)}}"><button class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"> View</i></button></a>
                                </td>
                                <td>
                                    {{-- <input type="file" name="paySleep"/> --}}
                                    <a href="{{url('customers/attachment_view',$invoice->id)}}"><button class="btn btn-primary btn-sm"><i class="fa fa-upload" aria-hidden="true"> Attach</i></button></a>
                                </td>
                                <td>
                                    <a href="{{url('customers/delete_invoice',$invoice->id)}}"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"> Delete</i></button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer_section')
@endsection
