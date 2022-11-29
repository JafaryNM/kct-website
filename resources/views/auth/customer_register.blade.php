@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="login-div-wrapper">
    <div class="login-table-cell">
        <div class="the-login-container input-container">
            <div class="row justify-content-center-">
                <div class="col-md-5-" style="padding: 0 !important; width: 100%">
                    <div class="login-right">
                        <form method="POST" action="{{route('customer.signup')}}" class="the-login-form">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger m-2">
                              <h6><b>{{$errors->first()}}</b></h6>
                            </div>
                            @endif
                            <h3 style="font-weight: 900;">Register</h3>
                            <div class="form-group row-">
                                <input type="text" placeholder="First Name" name="firstName" value=""  autofocus required/>
                            </div>
                            <div class="form-group row-">
                                <input type="text" placeholder="Last Name" name="lastName" value=""  autofocus required/>
                            </div>
                            <div class="form-group row-">
                                <select name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group row-">
                                <input type="text" placeholder="Phone Number" name="phoneNumber" value="" required/>
                            </div>
                            <div class="form-group row-">
                                <input type="email" placeholder="Email Address" name="email" value="" required/>
                            </div>
                            <div class="form-group row-">
                                <input type="text" placeholder="City" name="city"  required/>
                            </div>
                            <div class="form-group row-">
                                <textarea placeholder="Physical Address" name="address"  required></textarea>
                            </div>

                            <div class="form-group row-">
                                <input placeholder="Password" type="password" name="password" required>
                            </div>
                            <div class="form-group row-">
                                <input placeholder="Repeat Password" type="password" name="confirmPassword" required>
                            </div>

                            <div class="form-group row-" style="width: 100%; padding-left: 0 !important;">
                                <button style="width: 100%; margin-left: 0 !important;" type="submit" class="button red-button"><i class="fa fa-lock"></i> Submit</button>
                            </div>

                            <div class="login-footer" style="width: 100%; padding-left: 0 !important;">
                                <div class="login-footer-container">
                                <p>If you're already registered please login now</p>
                                <a href="{{url('customers/login')}}" style="width: 100%; margin-left: 0 !important; color: #fff;" type="submit" class="button black-button">Login</a>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer_section')
@endsection
