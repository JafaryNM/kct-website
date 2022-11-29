<!DOCTYPE html>
<html>
<head>
    {{-- <title>Larave Generate Invoice PDF - Nicesnippest.com</title> --}}
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Invoice</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Invoice #: <span class="gray-color">KCT/{{date("Y")}}/{{$product[0]->id}}</span></p>
        {{-- <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">162695CDFS</span></p> --}}
        <p class="m-0 pt-5 text-bold w-100">Order Date: <span class="gray-color">{{$product[0]->created_at}}</span></p>
    </div>
    <div class="w-50 float-left logo mt-10">
        {{-- <img src="https://www.nicesnippets.com/image/imgpsh_fullsize.png"/> --}}
    </div>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">From</th>
            <th class="w-50">To</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p><strong>KCT MOTORS COMPANY LTD</strong></p>
                    <p>Address: <strong>Mpakani Center, Ground Floor, Ring Wing</strong></p>
                    <p>Region: <strong>Dar es Salaam</strong></p>
                    <p>Country: <strong>Tanzania</strong></p>
                    <p>Email: <strong>mngwada@kctmotors.co.tz</strong></p>
                    <p>Contact: <strong>+255 655 170 190/764 170 700</strong></p>
                    <p>Tin Number: <strong>120-575-333</strong></p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>Customer Name: <strong>{{$product[0]->firstName}} {{$product[0]->lastName}}</strong></p>
                    <p>Phone Number: <strong>{{$product[0]->phoneNumber}}</strong></p>
                    <p>Email: <strong>{{$product[0]->email}}</strong></p>
                    <p>Address: <strong>{{$product[0]->address}}</strong></p>
                    <p>City: <strong>{{$product[0]->city}}</strong></p>
                    <p>Country: <strong>{{$product[0]->country}}</strong></p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10" style="margin-top: 40px;">
    <table class="table w-100 mt-10">
        <thead>
            <tr>
                <th>Model/Make/Year</th>
                <th>Color</th>
                <th>Milliage</th>
                <th>Engine Size</th>
                <th>First Installement</th>
                <th>Second Installement</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $row)
            <tr align="center">
                <td>{{$row->category}} {{$row->productName}} {{$row->year}}</td>
                <td>{{$row->color}}</td>
                <td>{{number_format($row->milles, 0, '.', ',')}}</td>
                <td>{{number_format($row->engineNo, 0, '.', ',')}} cc</td>
                <td>{{number_format($row->firstInstallment, 0, '.', ',')}}</td>
                <td>{{number_format($row->secondInstallment, 0, '.', ',')}}</td>
                <td>{{number_format($row->sellingPrice, 0, '.', ',')}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="7">
                    <div class="total-part" style="margin-top: 30px;">
                        <div class="total-left w-85 float-left" align="left">
                            <h4>Payment Terms</h4>
                            <p>100% of the total amount to be paid upfront before ordering of the vehicle;</p>
                            <p>50% of the total amount to be paid upfront brfore ordering of the vehicle;</p>
                            <p>Any % of the amount agreed by both parties.</p>
                            
                            <h4>Bank Details</h4>
                            <p>BANK NAME:  <strong>CRDB</strong></p>
                            <p>SWIFT CODE: <strong>CORUTZTZ</strong></p>
                            <p>BRANCH NAME: <strong>MAGOMENI</strong></p>
                            <p>BANK ADDRESS: <strong>MAGOMENI, MOROGORO ROAD</strong></p>
                            <p>ACCOUNT NUMBER: <strong>0150395431401</strong></p>
                            <p>ACCOUNT NAME: <strong>KCT MOTORS</strong></p>
                            <div class="text-center" style="margin-top: 70px;">
                                <h4>THANK YOU FOR YOUR ORDER, {{$product[0]->firstName}} {{$product[0]->lastName}}</h4>
                            </div>
                        </div>
                    </div> 
                </td>
            </tr>
        </tbody>
    </table>
</div>
</html>