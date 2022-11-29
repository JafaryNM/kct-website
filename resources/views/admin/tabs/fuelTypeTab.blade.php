<div role="tabpanel" class="tab-pane fade" id="fuelType">
    <div class="row">
        <div class="col-md-10">
            <h5>Fuel List</h5>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#fuelModal">Add Fuel Type</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Fuel Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fuelTypes as $fuel)  
                <tr>
                    <td>{{$fuel->fuelType}}</td>
                    <td>{{$fuel->created_at}}</td>
                    <td>
                        <a href="{{url('admins/fueltype/edit',$fuel->id)}}"><button class="btn btn-primary">Edit</button></a>
                        <a href="{{url('admins/fueltype/delete', $fuel->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>