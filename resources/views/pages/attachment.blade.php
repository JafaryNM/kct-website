@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<!-- Main User Dashbord-->
<section class="products">
    <div class="container">
        @include('layouts.customerProfileLeftNavbar')       
    </div>

    <div class="col-md-10">
        <div class="products-t t-s mt-5">
            {{-- <h4>Attachment</h4> --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-8">
                        <form action="{{route('attachment.save',$orders[0]->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
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
                                    <h5>NOTE: The file attached must be PDF format.</h5>
                                </div>
                                
                                <div class="card-body">
                                    <div class="file-upload-wrapper">
                                        <input type="file" name="fileUpload" id="input-file-now" class="file-upload" required/>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"> Upload</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer_section')
<script>
    $('.file-upload').file_upload();
</script>
@endsection
