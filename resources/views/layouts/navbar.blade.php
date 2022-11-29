<nav class="main-nav no-print">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-lg-2">
                <div class="menu-icon">
                    <a class="menu-icon-show"><i class="fa fa-bars"></i></a>
                    <a class="menu-icon-hide" style="display: none;"><i class="fa fa-times"></i></a>
                </div>
                <div class="site-logo">
                    <a href="{{url('/')}}">
                        <img class="big-logo" src="{{asset('customer/assets/img/logo.png')}}" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="col-md-8 col-lg-8">
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="right-nav">
                    <div class="login-nav" style="margin-right: 20px;">
                        <ul class="right-nav-li">
                            <li>
                                @if (Auth::check())
                                <a class="login-button" href="{{url('customers/profile')}}">
                                    <i class="fa fa-lock"></i> {{Auth::user()->firstName}}
                                </a>
                                @else
                                <a class="login-button" href="{{url('customers/login')}}">
                                    <i class="fa fa-lock"></i> Login / signup
                                </a>
                                @endif
                               
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</nav>