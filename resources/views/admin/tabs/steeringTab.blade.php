<div role="tabpanel" class="tab-pane fade" id="steering">
    <div class="row">
        <div class="col-md-10">
            <h5>Steering List</h5>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#steeringModal">Add Steering</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Steering</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($steerings as $steering)  
                <tr>
                    <td>{{$steering->steeringType}}</td>
                    <td>{{$steering->created_at}}</td>
                    <td>
                        <a href="{{url('admins/steering/edit',$steering->id)}}"><button class="btn btn-primary">Edit</button></a>
                        <a href="{{url('admins/steering/delete', $steering->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>