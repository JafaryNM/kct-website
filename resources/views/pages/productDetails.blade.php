
@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    @include('layouts.header')
    
    <!-- Vehicle Urls -->
 <ul class="breadcrumb" style="padding-left: 50px; color:#28a745 !important">
    <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" style="font-size: 20px; color:#28a745 !important"></i></a></li>
    <li class="breadcrumb-item"><a  style="color:#28a745 !important"  href="">Search Vehicles</a></li>
    <li class="breadcrumb-item"><a>{{$products[0]->productName}}</a></li>
    <li class="breadcrumb-item"><a>{{$products[0]->years->year}}</a></li>
    <li class="breadcrumb-item"><a>{{$products[0]->categories->categoryName}}</a></li>
    {{-- <li class="breadcrumb-item"><a>Toyota</a></li> --}}
</ul>
   <!-- Vehicle Detail Section -->
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="section-details">
                <div class="container-fluid">
                    @if ($errors->any())
                    <div class="alert alert-danger m-2">
                      <h6><b>{{$errors->first()}}</b></h6>
                    </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                        <h6><b>successfully.</b></h6>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row product-header">
                                <div class="col-lg-8 col-md-8">
                                    <h1 style="margin-top: 0; margin-bottom: 0; padding-bottom: 0">
                                        {{$products[0]->years->year}} {{$products[0]->productName}}
                                    </h1>
                                    <div class="product-info" style="padding-bottom: 30px;">
                                        <div class="gray-info text-left"
                                            style="background: #fff; padding: 0; margin-top: 0 !important;">
                                            <h3>TZS <strong>{{number_format($products[0]->selingPrice, 0, '.', ',')}}</strong></h3>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                           {{-- Car Image Section --}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="product-img">
                                        {{--  Single Main Image --}}
                                        <a href= "{{asset('productsImages/'.$products[0]->productFrontImage)}}"
                                        data-lightbox="mygallery" data-lightbox="mygallery" target="_blank">
                                            <img src="{{asset('productsImages/'.$products[0]->productFrontImage)}}" alt="Used for Sale"
                                            style="width: 318px; height: auto; visibility: visible;" />
                                        </a>
                                    </div>
                                 
                                </div>
                                <div class="col-6">
                                    <div id="gallery" class="vehicle-gallery">
                                        <ul class="cf">
                                        @foreach ($images as $imageName)
                                        <li style="visibility: visible;">
                                                <a href="{{asset('multImages/'.$imageName->image)}}"
                                                data-lightbox="mygallery" >
                                                    <img src="{{asset('multImages/'.$imageName->image)}}" style="width: 100px; height: auto; visibility: visible;" >
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    </div>

                                 </div>
                            </div>
                           
                            
                            <div class="car-info-1">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="sec-box">
                                            <i class="fa fa-calendar"></i>
                                            <span>Year</span>
                                            <span><strong>{{$products[0]->years->year}}</strong></span>
                                        </div>
                                    </div>
            
                                    <div class="col-md-2">
                                        <div class="sec-box">
                                            <i class="fa fa-dashboard"></i>
                                            <span>Mileage</span>
                                            <span><strong>{{$products[0]->productMiles}}</strong></span>
                                        </div>
                                    </div>
            
                                    <div class="col-md-2">
                                        <div class="sec-box">
                                            <i class="fa fa-car"></i>
                                            <span>Fuel type</span>
                                            <span><strong>{{$products[0]->fuels->fuelType}}</strong></span>
                                        </div>
                                    </div>
            
                                    <div class="col-md-2">
                                        <div class="sec-box">
                                            <i class="fa fa-cogs"></i>
                                            <span>Transmission</span>
                                            <span><strong>{{$products[0]->transmitions->transmitionName}}</strong></span>
                                        </div>
                                    </div>
            
                                    <div class="col-md-2">
            
                                        <div class="sec-box">
                                            <i class="fa fa-wheelchair"></i>
                                            <span>Seats</span>
                                            <span><strong>{{$products[0]->seat}}</strong></span>
                                        </div>
                                    </div>
            
                                    <div class="col-md-2">
                                        <div class="sec-box">
                                            <i class="fa fa-cog"></i>
                                            <span>Engine</span>
                                            <span><strong>{{$products[0]->engineNo}} CC</strong></span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="car-info-3">
                                <div class="row list-5">
                                    <div class="col-md-3">
                                        <h3>Car <br> Features</h3>
                                    </div>
                                        <div class="col-md-9">
                                            <!--<h4>All Features</h4>-->
                                            <ul>
                                              <div class="container">
                                                <div class="row">
                                                    <li class="col-md-3">
                                                        <i class="fa fa-check-circle" style="color:#D4AB06" aria-hidden="true"></i>
                                                        <span style=""><strong>Air bags</strong></span>
                                                    </li>
                                                    <li class="col-md-3">
                                                        <i class="fa fa-check-circle" style="color:#D4AB06" aria-hidden="true"></i>
                                                        <span style=""><strong>Air bags</strong></span>
                                                    </li>
                                                </div>
                                              </div>       
                                            </ul>
                                        </div>
                                </div>
                            </div>
        
                            <div class="enquires" id="order">
                                <div class="form-gray">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h2>Send Inquiries</h2>
                                            <form action="{{route('customers.createEnquiry')}}" method="post">
                                                @csrf
                                                <div class="cart-button cart-item-container">
                                                    <div class="customer-details">
                                                        <div class="the-preview-container input-container">
                                                            <div class="row justify-content-center-">
                                                                <div class="col-md-12">
                                                                    <div class="login-right row">
                                                                        <!-- hidden inputs -->
                                                                        <input type="text" value="{{$products[0]->productName}}" name="productName" hidden/>
                                                                        <input type="text" value="{{$products[0]->categories->categoryName}}" name="categoryName" hidden/>
                                                                        <input type="text" value="{{$products[0]->years->year}}" name="year" hidden/>
                                                                        <input type="text" value="{{$products[0]->selingPrice}}" name="sellingPrice" hidden/>
                                                                        <input type="text" value="{{$products[0]->productFrontImage}}" name="productImage" hidden/>
                                                                        <input type="text" value="{{$products[0]->engineNo}}" name="engineNo" hidden/>
                                                                        <input type="text" value="{{$products[0]->productMiles}}" name="milles" hidden/>
                                                                        <input type="text" value="{{$products[0]->colors->colorType}}" name="color" hidden/>
                                                                        @if (Auth::check())
                                                                        <!-- LogedIn Customer form -->
                                                                       @include('layouts.logedInEnquiriesCustomerForm')
                                                                        <div class="form-group col-md-12">
                                                                            <p>Inquiry details</p>
                                                                            <textarea rows="6" placeholder="Inquiry details"
                                                                                name="inquiry" required></textarea>
                                                                        </div>
                                                                        @else
                                                                        <!-- LogedOut Customer form -->
                                                                       @include('layouts.logedOutEnquiriesCustomerForm')
                                                                        <div class="form-group col-md-12">
                                                                            <p>Inquiry details</p>
                                                                            <textarea rows="6" placeholder="Inquiry details"
                                                                                name="inquiry" required></textarea>
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--inquiry button -->
                                                    <button style="float: left; width: 42%" type="submit"
                                                        class="blue confirm-order-button">
                                                        Send Inquiry
                                                    </button>

                                                    <!-- Button trigger modal -->
                                                    <button type="button" data-toggle="modal" data-target="#exampleModal" style="float: right; width: 46%; background: #000" 
                                                        class="blue confirm-order-button">
                                                        Order now
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4 login-options">
                                            <h3>Already Member?</h3>
                                            <a href="{{url('customers/register')}}">
                                                Create Account
                                            </a>
        
                                            <a href="{{url('customers/login')}}">
                                                Login Now
                                            </a>
                                        </div>
                                     
                                        <!-- ORDER MODAL -->
                                       @include('layouts.orderModal')
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>           
                </div>         
            </div>
        </div>
        <div class="col-3">
            <div class="sidebar-width-single-vehicle">
                <div class="follow-us">
                    <h3 class="follow-us-h">Follow Us On</h3>
            
                    <ul class="social-links-top">
                        <li><a href="https://web.facebook.com/kctmotors-101935778324510" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
                        <li><a href="https://www.instagram.com/kctmotors/?hl=en" target="_blank"><i class="fa fa-instagram"></i> Instagram</a></li>
                        <li><a href="https://www.youtube.com/channel/UCydntCGQFB1c5ngn4pK3-MQ"><i class="fa fa-youtube"></i> Youtube</a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=+255746170700"><i class="fa fa-whatsapp"></i> Whats app</a></li>
            
                    </ul>
                </div>
            
            
                <div class="right-side-info">
                    <h3 class="h3-bold text-left">Create Account</h3>
                    <small>create account to access this</small>
                    <ul class="account-info">
                        <li><a href="userauth/register.html"><i class="fa fa-hand-pointer-o"></i> Earn
                                Points</a></li>
                        <li><a href=""><i class="fa fa-heart"></i> Favourite</a></li>
                        <li><a href=""><i class="fa fa-bell"></i> Notify Me</a></li>
                        <li><a href=""><i class="fa fa-list"></i> Wish list</a></li>
                        <li><a href=""><i class="fa fa-envelope-o"></i> Easy Enquiry</a>
                        </li>
                        <li><a href=""><i class="fa fa-shopping-cart"></i> Buy Now</a>
                        </li>
                    </ul>
                    <div class="create-account">
                        <a href="{{url('customers/register')}}">CREATE ACCOUNT</a>
                    </div>
                </div>
            
               
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer_section')
@endsection

