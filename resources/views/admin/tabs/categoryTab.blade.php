<div role="tabpanel" class="tab-pane fade" id="categories">
    <div class="row">
        <div class="col-md-10">
            <h5>Manufactures List</h5>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#categoryModal">Add Category</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)  
                <tr>
                    <td>{{$category->categoryName}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        <a href="{{url('admins/category/edit',$category->id)}}"><button class="btn btn-primary">Edit</button></a>
                        <a href="{{url('admins/category/delete', $category->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   
</div>