@extends('admin.layouts.adminApp')

@section('content')
    <body class="login-page">
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);">Admin Login</b></a>
            </div>
            <div class="card">
                <div class="body">
                    @if ($errors->any())
                    <div class="alert alert-danger m-2">
                    <h6><b>{{$errors->first()}}</b></h6>
                    </div>
                    @endif
                    <form id="sign_in" method="POST" action="{{route('admins.loginUser')}}">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" placeholder="email" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                <label for="rememberme">Remember Me</label>
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                            </div>
                        </div>
                        <div class="row m-t-15 m-b--20">
                            <div class="col-xs-6">
                                <a href="{{url('admins/register')}}">Register Now!</a>
                            </div>
                            <div class="col-xs-6 align-right">
                                <a href="{{url('admins/forget_password')}}">Forgot Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
