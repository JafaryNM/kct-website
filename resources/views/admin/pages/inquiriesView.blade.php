@extends('admin.layouts.adminApp')

@section('content')
    @include('admin.layouts.topbar')
    @include('admin.layouts.page_loader')
    @include('admin.layouts.left_sidebar')

    <style>
        .inquer-b {
        padding: 20px 30px;
        border: solid 0.5px;
        border-color: lavender
    }
    .card{
        height: 900px;;
    }
    .inquiry-desc{
        margin-top: 50px;
    }
    </style>
    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                      <div class="card-body">
                                          <div class="container">
                                              <div class="row">
                                                <div class="col-md-7">
                                                  <img src="{{asset('customer/assets/img/invoice_logo.jpeg')}}" style="width: 200px; height:200px"/>
                                                </div>
                                                <div class="col-md-5 " style="margin-top: 20px;">
                                                  <span><strong>KCT MOTORS COMPANY LTD</strong></span><br>
                                                  {{-- <span>P.O.BOX 234,</span><br> --}}
                                                  <span><strong>Address: </strong>Mpakani Center, Ground Floor</span><br>
                                                  <span><strong>Tel: </strong>+255 655 170 190/+255 746 170 700</span><br>
                                                  <span><strong>Email:   </strong><span style="color: #F04035;">mngwada@kctmotors.co.tz</span></span><br>
                                                  <span><strong>Website: </strong><span style="color: #F04035;">www.kctmotors.co.tz</span></span><br>
                                                  <span><strong>TIN: </strong>120-575-333</span>
                                                </div>
                                              </div><hr>
                                  
                                              <div class="row mb-3">
                                                  <div class="col-md-5">
                                  
                                                  </div>
                                                  <div class="col-md-4">
                                                      <span style="font-size: 25px;"><strong>INQUERY</strong></span>
                                                  </div>
                                              </div>
                                  
                                              <div class="row">
                                                  <div class="col-md-5">
                                                      <span><strong>From:</strong></span><br>
                                                      <span><strong>Customer</strong> {{$inquiries[0]->firstName}} {{$inquiries[0]->lastName}}</span><br>
                                                      <span><strong>Phone:</strong> {{$inquiries[0]->phoneNumber}}</span><br>
                                                      <span><strong>Email:</strong> {{$inquiries[0]->email}}</span><br>
                                                      <span><strong>Country:</strong> {{$inquiries[0]->country}}</span><br>
                                                      <span><strong>City:</strong> {{$inquiries[0]->city}}</span><br>
                                                      <span><strong>Address:</strong> {{$inquiries[0]->address}}</span><br>
                                                  </div>
                                              </div>

                                              <div class="col-md-10" style="margin-top: 35px;">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Photo</th>
                                                                <th>Model/Make/year</th>
                                                                <th>Colors</th>
                                                                <th>Engine No</th>
                                                                <th>Date/Time</th>
                                                                <th>Price</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td><img src="{{asset('productsImages/'.$inquiries[0]->productImage)}}" width="50", height="50"/></td>
                                                                <td>{{$inquiries[0]->category}} {{$inquiries[0]->productName}} {{$inquiries[0]->year}}</td>
                                                                <td>{{$inquiries[0]->color}}</td>
                                                                <td>{{number_format($inquiries[0]->engineNo, 0, '.', ',')}}</td>
                                                                <td>{{$inquiries[0]->created_at}}</td>
                                                                <td>{{number_format($inquiries[0]->sellingPrice, 0, '.', ',')}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                              </div>
                                              
                                              <div class="col-md-10 inquiry-desc">
                                                <h5>Inquiry Descriptions</h5>
                                                <div class="inquer-b">
                                                    <p>{{$inquiries[0]->inquiry}}</p>
                                                </div>
                                              </div>
                                          </div>
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





