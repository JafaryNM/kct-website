<div role="tabpanel" class="tab-pane fade" id="productType">
    <div class="row">
        <div class="col-md-10">
            <h5>Vehicles Type</h5>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#productTypeModal">Add Vihecle Type</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Vehicle Type</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productTypes as $type)  
                <tr>
                    <td>{{$type->productType}}</td>
                    <td>{{$type->created_at}}</td>
                    <td>
                        <a href="{{url('admins/types/edit',$type->id)}}"><button class="btn btn-primary">Edit</button></a>
                        <a href="{{url('admins/types/delete', $type->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>