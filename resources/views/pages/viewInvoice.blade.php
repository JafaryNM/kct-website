@extends('layouts.app')

@section('content')
<style>
    @media print {
    header, .footer, footer {
        display: none;
    }
    .no-print{
        display: none;
    }
}
</style>
@include('layouts.navbar')
<!-- Main User Dashbord-->
<section class="products">
    <div class="container">
        {{-- @include('layouts.customerProfileLeftNavbar')--}}
    </div>
    <div class="col-md-12">
        <div class="products-t t-s">
           <!-- invoices place -->
           <div class="card mt-3">
                <section class="content">
                    <div class="row">
                        <div class="col-sm-12">
                            {{-- <div class="panel panel-bd"> --}}
                                <div id="printableArea" style=" background: #fff; padding: 30px;">
                                    <div class="panel-body">
                                        <div class="row" style="border-bottom:2px #333 solid;">
                                            <div class="col-sm-8 col-md-8" style="display: inline-block;">
                                                <img src="{{asset('customer/assets/img/invoice_logo.jpeg')}}" class="" alt="" style="margin-bottom:20px; max-width: 200px; border: 0px solid #666; max-height: 150px">
                                            </div>
                                            <div class="col-sm-4 col-md-4 text-left" style="display: inline-block;">
                                                <h1 style="margin-top: 40px; text-align: right;">Proforma Invoice</h1>
                                            </div>
                                        </div>
                                        <div class="row" style="border-bottom:2px #333 solid;">
                                            <div class="col-sm-8 col-md-8" style="display: inline-block;">
                                                <span class="billing-heading" style="padding:4px 10px; 2px">Billing from</span>
                                                <address style="margin-top:10px; font-size: 12px; border: 1px solid #666; padding: 16px; width: 380px;">
                                                    <strong style="font-size: 20px; ">
                                                        KCT MOTORS LTD
                                                    </strong><br>
                                                    <br>
                                                    Magomeni Usalama, 3D Building, Ground Floor Left Wing<br>
                                                    Dar es Salaam, Tanzania<br>
                                                    +255655170190 / +2552625 865 109<br>
                                                    sales@kctmotors.co.tz<br>
                                                    www.kctmotors.co.tz<br><br>
                                                    {{-- TIN : 120-575-333 --}}
                                                </address>
                                                <span class="billing-heading m-r-15 p-10">Billing to</span>
                                                <address style="margin-top:10px; font-size: 12px; border: 1px solid #666; padding: 16px; width: 380px;">
                                                    <strong style="font-size: 20px; ">{{$customerInvoices[0]->firstName}} {{$customerInvoices[0]->lastName}}</strong><br>
                                                    <abbr><b>Address: </b></abbr>
                                                    {{$customerInvoices[0]->address}}<br>
                                                    <abbr><b>Mobile: </b></abbr>
                                                    {{$customerInvoices[0]->phoneNumber}}<br>
                                                    <abbr><b>Email: </b></abbr>
                                                    {{$customerInvoices[0]->email}}
                                                </address>
                                            </div>
                                            <div class="col-sm-4 col-md-4 text-left" style="display: inline-block; float: right">
                                                <div style="margin-top:10px; font-size: 12px;">
                                                    <table style="width: 100%" class="invoice-address-table">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2">TIN: 120-575-333</td>
                                                            </tr>
                                                            <tr>
                                                            <td>Invoice No.</td>
                                                            <td>KCT/{{date("Y")}}/{{$customerInvoices[0]->id}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Invoice Date</td>
                                                            <td>{{$customerInvoices[0]->created_at}}</td>
                                                        </tr>
                                                    </tbody></table>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="table-responsive m-b-20">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th class="text-center-">Year/Model/Make</th>
                                                    <th class="text-center">Engine Size</th>
                                                    <th class="text-center">Color</th>
                                                    <th class="text-center">Mileage</th>
                                                    <th class="text-center">First Installement</th>
                                                    <th class="text-center">Second Installement</th>
                                                    <th class="text-right">Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center-"><div><strong>{{$customerInvoices[0]->year}} {{$customerInvoices[0]->category}} {{$customerInvoices[0]->productName}}</strong></div></td>
                                                        <td class="text-center"><div><strong>{{number_format($customerInvoices[0]->engineNo, 0, '.', ',')}} CC</strong></div></td>
                                                        <td class="text-center"><div><strong>{{$customerInvoices[0]->color}}</strong></div></td>
                                                        <td class="text-center"><div><strong>{{number_format($customerInvoices[0]->milles, 0, '.', ',')}} KM</strong></div></td>
                                                        <td class="text-center"><div><strong>{{number_format($customerInvoices[0]->firstInstallment, 0, '.', ',')}}</strong></div></td>
                                                        <td class="text-center"><div><strong>{{number_format($customerInvoices[0]->secondInstallment, 0, '.', ',')}}</strong></div></td>
                                                        <td align="right">{{number_format($customerInvoices[0]->sellingPrice, 0, '.', ',')}}</td>
                                                    </tr>
                                                    <tr>
                                                    <td class="text-right" colspan="3" style="border: 0px"><b></b></td>
                                                    <td align="right" style="border: 0px"><b></b></td>
                                                    <td align="right" style="border: 0px"><b></b></td>
                                                </tr>
                                                </tbody>
                                            </tfoot>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8" style="display: inline-block;">
                                                <p></p>
                                                <p><strong></strong></p>
                                            </div>
                                            <div class="col-md-4 col-sm-4 pull-right" style="float: right">
                                                <table class="table">                                                                                                           <tbody><tr>
                                                        <th class="text-left grand_total">Subtotal:</th>
                                                        <td class="text-right grand_total">{{number_format($customerInvoices[0]->sellingPrice, 0, '.', ',')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-left grand_total">Grand Total :</th>
                                                        <td class="text-right grand_total">{{number_format($customerInvoices[0]->sellingPrice, 0, '.', ',')}}</td>
                                                    </tr>
                                                </tbody></table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <address style="margin-top:10px; font-size: 12px !important; border: 1px solid #666; padding: 4px; text-align: center">
                                                    <h3 style="color: #666 !important; margin: 0 !important;font-weight:normal !important; font-size: 13px !important;">PAYMENT: BY CHEQUE, CASH OR DIRECT TRANSFER TO OUR ACCOUNT AS HIGHLIGHTED BELOW;</h3>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row" style="position: relative">
                                            <div class="col-lg-12 col-md-12">
                                                <div style="margin-top:10px; font-size: 12px; border: 1px solid #333; padding: 16px;">
                                                    BANK NAME: CRDB<br>
                                                    SWIFT CODE: CORUTZTZ<br>
                                                    BRANCH NAME: MAGOMENI<br>
                                                    BANK ADDRESS: MAGOMENI, MAPIPA, MOROGORO ROAD<br>
                                                    ACCOUNT NUMBER: 0150395431400<br>
                                                    ACCOUNT NAME: KCT MOTORS                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 40px; border-top: 1px solid #eee; padding-top: 10px;">
                                            <div class="col-12">
                                                <h6>Terms and Conditions</h6>
                                                <p style="font-size: 11px;">
                                                    </p><p>100% of the total amount to be paid upfront before ordering of the vehicle; <br>50% of the total amount to be paid upfront before ordering of the vehicle; <br>Any % of the amount agreed by both parties.</p>                                                    <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                          
                                    <div class="panel-footer text-left no-print" style="padding: 10px 16px; border: 1px solid #eee;">
                                        <h4>Attachments</h4>
                                        {{-- <p>There are no attachment found</p> --}}
                                        <a href="{{asset('paySlip/'.$customerInvoices[0]->paySlip)}}">{{$customerInvoices[0]->paySlip}}</a>
                                    </div>

                                    <div class="panel-footer text-left no-print" style="padding: 10px 16px;">
                                        <a style="float: left;" class="btn btn-danger" href="{{url('customers/profile')}}">Go back</a>
                                        <button class="btn btn-primary" onclick="printFunction()">Print</button>
                                        <div style="clear:both"></div>
                                    </div>
                                    <a href="{{url('customers/send_mail',$customerInvoices[0]->id)}}"><button class="btn btn-primary no-print">Share to Email</button></a>
                                </div>
                        {{-- </div> --}}
                    </div>
                </section>
          </div>
        </div>
    </div>
</section>
@include('layouts.footer_section')

<script>
function printFunction(){
    window.print();
}
</script>
@endsection
