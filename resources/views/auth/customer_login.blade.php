@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="login-div-wrapper">
    <div class="login-table-cell">
        <div class="the-login-container input-container">
            <div class="row justify-content-center-">
                <div class="col-md-5-" style="padding: 0 !important; width: 100%">
                    <div class="login-right">
                        <form method="POST" action="{{route('customers.signin')}}" class="the-login-form">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger m-2">
                              <h6><b>{{$errors->first()}}</b></h6>
                            </div>
                            @endif
                            <h3 style="font-weight: 900;">Customer Login</h3>
                            <div class="form-group row-">
                                <label for="email" class="col-sm-4- col-form-label text-md-right">Email Address</label>
                                <input id="email" type="email" placeholder="Email Address" name="email" value="" required autofocus />
                            </div>

                            <div class="form-group row-">
                                <label for="password" class="col-md-4- col-form-label text-md-right">Password</label>
                                <input id="password" placeholder="Password" type="password" name="password" required>
                            </div>
                            <div class="form-group row-">
                            <p>
                                <a href="{{url('customers/forget_password')}}" style="width: 100%; margin-left: 0 !important; color: #0000cc;"><i class="fa fa-question-circle"></i> Forgot Password?</a>
                            </p>
                            </div>

                            <div class="form-group row-" style="width: 100%; padding-left: 0 !important;">
                                <button style="width: 100%; margin-left: 0 !important;" type="submit" class="button red-button"><i class="fa fa-lock"></i> Login</button>
                            </div>

                            <div class="login-footer" style="width: 100%; padding-left: 0 !important;">
                                <div class="login-footer-container">
                                <p>If you're not yet registered please register now</p>
                                <a href="{{url('customers/register')}}" style="width: 100%; margin-left: 0 !important; color: #fff;" class="button black-button">Register</a>
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
