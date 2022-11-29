<div role="tabpanel" class="tab-pane fade" id="vihecleColor">
    <div class="row">
        <div class="col-md-10">
            <h5>Colors List</h5>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#colorModal">Add Vihecle Color</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Color Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $color)  
                <tr>
                    <td>{{$color->colorType}}</td>
                    <td>{{$color->created_at}}</td>
                    <td>
                        <a href="{{url('admins/colors/edit',$color->id)}}"><button class="btn btn-primary">Edit</button></a>
                        <a href="{{url('admins/colors/delete', $color->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>