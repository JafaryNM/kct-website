@extends('admin.layouts.adminApp')

@section('content')
    @include('admin.layouts.topbar')
    @include('admin.layouts.page_loader')
    @include('admin.layouts.left_sidebar')
    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-md-12 p-3">
                      @if(session()->has('success'))
                        <div class="alert alert-success">
                          <h6><b>successfully.</b></h6>
                        </div>
                      @endif
                      @if ($errors->any())
                      <div class="alert alert-danger mt-2">
                        <h6><b>{{$errors->first()}}</b></h6>
                      </div>
                      @endif
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                               
                            </div>
                            <div class="body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#invoice" data-toggle="tab">INVOICES</a></li>
                                    <li role="presentation"><a href="#inquiry" data-toggle="tab">INQUIRIES</a></li>
                                </ul>

                                <!--Tab content -->
                                <div class="tab-content">
                                    <!--invoice Tab -->
                                    <div role="tabpanel" class="tab-pane fade in active" id="invoice">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>Invoice #</th>
                                                        <th>Photo</th>
                                                        <th>Customer</th>
                                                        <th>Make/year</th>
                                                        <th>Date/Time</th>
                                                        <th>Status</th>
                                                        <th>Price</th>
                                                        <th>View</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($invoices as $invoice)
                                                        <tr>
                                                            <td>KCT/{{date("Y")}}/{{$invoice->id}}</td>
                                                            <td>
                                                                <img src="{{asset('productsImages/'.$invoice->productImage)}}" style="width: 50px;".>
                                                            </td>
                                                            <td>{{$invoice->firstName}} {{$invoice->lastName}}</td>
                                                            <td>{{$invoice->productName}}  {{$invoice->year}}</td>
                                                            <td>{{$invoice->created_at}}</td>
                                                            <td><span>{{$invoice->status}}</span></td>
                                                            <td>{{number_format($invoice->sellingPrice, 0, '.', ',')}}</td>
                                                            <td>
                                                                <a href="{{url('admins/invoice_view',$invoice->id)}}"><button class="btn btn-primary">View</button></a>
                                                            </td>
                                                            <td>
                                                                <a href="{{url('admins/invoice_delete',$invoice->id)}}"><button class="btn btn-danger">Delete</button></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!--inquiry Tab -->
                                    <div role="tabpanel" class="tab-pane" id="inquiry">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>Inquiry #</th>
                                                        <th>Photo</th>
                                                        <th>Customer</th>
                                                        <th>Make/year</th>
                                                        <th>Date/Time</th>
                                                        <th>Descriptions</th>
                                                        <th>Price</th>
                                                        <th>View</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($inquiries as $inquiry)
                                                        <tr>
                                                            <td>KCT/{{date("Y")}}/{{$inquiry->id}}</td>
                                                            <td>
                                                                <img src="{{asset('productsImages/'.$inquiry->productImage)}}" style="width: 50px;".>
                                                            </td>
                                                            <td>{{$inquiry->firstName}} {{$inquiry->lastName}}</td>
                                                            <td>{{$inquiry->productName}} {{$inquiry->year}}</td>
                                                            <td>{{$inquiry->created_at}}</td>
                                                            <td><span>{{Str::of($inquiry->inquiry)->limit(12)}}</span></td>
                                                            <td>{{number_format($inquiry->sellingPrice, 0, '.', ',')}}</td>
                                                            <td>
                                                                <a href="{{url('admins/inquiry_view',$inquiry->id)}}"><button class="btn btn-primary">View</button></a>
                                                            </td>
                                                            <td>
                                                                <a href="{{url('admins/inquiry_delete',$inquiry->id)}}"><button class="btn btn-danger">Delete</button></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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





