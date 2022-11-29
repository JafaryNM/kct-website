<div role="tabpanel" class="tab-pane fade" id="transmition">
    <div class="row">
        <div class="col-md-10">
            <h5>Transmition List</h5>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#transmitionModal">Add Transmition</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Transmition Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transmitions as $transmition)  
                <tr>
                    <td>{{$transmition->transmitionName}}</td>
                    <td>{{$transmition->created_at}}</td>
                    <td>
                        <a href="{{url('admins/transmition/edit',$transmition->id)}}"><button class="btn btn-primary">Edit</button></a>
                        <a href="{{url('admins/transmition/delete', $transmition->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>