<div role="tabpanel" class="tab-pane fade" id="condition">
    <div class="row">
        <div class="col-md-10">
            <h5>Vihecle Condition List</h5>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#condtionModal">Add Vihecle Condition</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Condition</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conditions as $condition)  
                <tr>
                    <td>{{$condition->conditionName}}</td>
                    <td>{{$condition->created_at}}</td>
                    <td>
                        <a href="{{url('admins/conditions/edit',$condition->id)}}"><button class="btn btn-primary">Edit</button></a>
                        <a href="{{url('admins/conditions/delete', $condition->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>