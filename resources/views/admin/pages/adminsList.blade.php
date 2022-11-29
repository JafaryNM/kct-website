@extends('admin.layouts.adminApp')


@section('content')
    @include('admin.layouts.topbar')
    @include('admin.layouts.page_loader')
    @include('admin.layouts.left_sidebar')
    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                    <h6><b>successfully.</b></h6>
                                    </div>
                                @endif
                                <h2>Admins List</h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>User Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($admins as $admin)  
                                            <tr>
                                                <td>{{$admin->firstName}}</td>
                                                <td>{{$admin->lastName}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td>{{$admin->userType}}</td>
                                                <td>
                                                    <a href="{{url('admins/edit',$admin->id)}}"><button class="btn btn-primary">Edit</button></a>
                                                    <a href="{{url('admins/delete', $admin->id)}}"><button class="btn btn-danger">Delete</button></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Exportable Table -->
            </div>
        </section>
    </body>
@endsection





