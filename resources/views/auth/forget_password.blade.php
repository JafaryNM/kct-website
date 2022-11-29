@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="login-div-wrapper">
        <div class="login-table-cell">
            <div class="the-login-container input-container">
                <div class="row justify-content-center-">
                    <div class="col-md-5-" style="padding: 0 !important; width: 100%">
                        <div class="login-right">
                            <form method="POST" action="/userauth/process_forgot" class="the-login-form">
                                <h3 style="font-weight: 900;">Password Help</h3>
                                
                                <div class="form-group row-">
                                    <label for="email" class="col-sm-4- col-form-label text-md-right">Enter your email address</label>
                                    <input id="email" type="email" placeholder="Email Address" name="username" value="" required autofocus />
                                </div>

                                <div class="form-group row-" style="width: 100%; padding-left: 0 !important;">
                                    <button style="width: 100%; margin-left: 0 !important;" type="submit" class="button red-button"><i class="fa fa-lock"></i> Verify</button>
                                </div>

                                <div class="login-footer" style="width: 100%; padding-left: 0 !important;">
                                    <div class="login-footer-container">
                                    <p>Already registered, login now</p>
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