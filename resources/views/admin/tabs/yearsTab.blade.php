<div role="tabpanel" class="tab-pane fade" id="year">
    <div class="row">
        <div class="col-md-10">
            <h5>Years List</h5>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#yearsModal">Add Year</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($years as $yearName)  
                <tr>
                    <td>{{$yearName->year}}</td>
                    <td>{{$yearName->created_at}}</td>
                    <td>
                        <a href="{{url('admins/years/edit',$yearName->id)}}"><button class="btn btn-primary">Edit</button></a>
                        <a href="{{url('admins/years/delete', $yearName->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>