<!-- Top Bar -->
<body class="theme-blue">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{route('admins.dashboard')}}">KCT MOTORS - ADMIN PANEL</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">  
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <span style="font-size: 18px;">{{Auth::user()->firstName}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">{{Auth::user()->firstName}}</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="{{route('admins.logout')}}">
                                            <h4>Logout</h4>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li> --}}
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
<!-- #Top Bar -->