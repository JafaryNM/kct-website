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
                                <h2>Update Condition</h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-12 p-3">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                        <h6><b>successfully.</b></h6>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                                <form method="POST" action="{{route('conditions.save',$conditions[0]->id)}}">
                                    @csrf
                                    <div class="row">
                                    <div class="col-md-4">
                                        <label>Condition name</label>
                                        <input class="form-control" value="{{$conditions[0]->conditionName}}" type="text" name="condition" placeholder="Condition name" />
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>   
    </body>
@endsection