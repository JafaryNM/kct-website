@extends('admin.layouts.adminApp')

@section('content')
    @include('admin.layouts.topbar')
    @include('admin.layouts.page_loader')
    @include('admin.layouts.left_sidebar')
    <body>
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-md-12 p-3">
                      @if(session()->has('success'))
                        <div class="alert alert-success">
                          <h6><b>successfully.</b></h6>
                        </div>
                      @endif
                      @if ($errors->any())
                      <div class="alert alert-danger mt-2">
                        <h6><b>{{$errors->first()}}</b></h6>
                      </div>
                      @endif
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                               
                            </div>
                            <div class="body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#products" data-toggle="tab">VEHICLES</a></li>
                                    <li role="presentation"><a href="#categories" data-toggle="tab">MANUFACTURES</a></li>
                                    <li role="presentation"><a href="#transmition" data-toggle="tab">TRANSMITIONS</a></li>
                                    <li role="presentation"><a href="#fuelType" data-toggle="tab">FUEL TYPES</a></li>
                                    <li role="presentation"><a href="#condition" data-toggle="tab">CONDITIONS</a></li>
                                    <li role="presentation"><a href="#vihecleColor" data-toggle="tab">COLORS</a></li>
                                    <li role="presentation"><a href="#year" data-toggle="tab">YEARS</a></li>
                                    <li role="presentation"><a href="#productType" data-toggle="tab">VEHICLES TYPES</a></li>
                                </ul>

                                <!--Tab content -->
                                <div class="tab-content">
                                 <!-- Product List Tab -->
                                   @include('admin.tabs.productTab')

                                    <!-- Categories List Tab -->
                                    @include('admin.tabs.categoryTab')

                                    <!-- Transmition List Tab -->
                                   @include('admin.tabs.transmitionTab')

                                    <!-- Fuel Type List Tab -->
                                   @include('admin.tabs.fuelTypeTab')

                                    <!-- Condition List Tab -->
                                   @include('admin.tabs.conditionsTab')

                                    <!-- Vihecle color List Tab -->
                                    @include('admin.tabs.vehiclesColorTab')

                                    <!-- Years List Tab -->
                                   @include('admin.tabs.yearsTab')

                                    <!-- Product Type Tab -->
                                   @include('admin.tabs.productTypeTab')
                                </div>
                                <!--end Tab content -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--PRODUCT MODAL -->
                <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <form method="POST" action="{{route('product.save')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row clearfix" style="margin-top: 50px;">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="productName" placeholder="Vihecle Name" required/>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="productModel" placeholder="Model" required/>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="productDoors" placeholder="Doors" required/>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="productChases" placeholder="Chases Number" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="row clearfix" style="margin-top: 18px;">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="productMiles" placeholder="Miles" required/>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-3">
                                            <input class="form-control" type="file" name="productFrontImage" required/>
                                        </div>
    
                                        <div class="col-md-3">
                                            <select class="form-control show-tick" name="productCategoryId" required>
                                                <option value="">Select Manufacture</option>
                                                @foreach ($categories as $categorie)
                                                    <option value="{{$categorie->id}}">{{$categorie->categoryName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
    
                                        <div class="col-md-3">
                                            <select class="form-control show-tick" name="productFuelTypeId" required>
                                                <option value="">Select Fuel Type</option>
                                                @foreach ($fuelTypes as $fuel)
                                                    <option value="{{$fuel->id}}">{{$fuel->fuelType}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control show-tick" name="productTransmitionId" required>
                                                <option value="">Select Transmition</option>
                                                @foreach ($transmitions as $transmition)
                                                    <option value="{{$transmition->id}}">{{$transmition->transmitionName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control show-tick" name="yearId" required>
                                                <option value="">Select Yeah</option>
                                                @foreach ($years as $yearName)
                                                    <option value="{{$yearName->id}}">{{$yearName->year}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="seat" placeholder="Seat" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="engineNo" placeholder="Engine No" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="selingPrice" placeholder="Selling Price" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control show-tick" name="productTypeId" required>
                                                <option value="">Select Vehicle Type</option>
                                                @foreach ($productTypes as $type)
                                                    <option value="{{$type->id}}">{{$type->productType}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control show-tick" name="color" required>
                                                <option value="">Select Vehicle Color</option>
                                                @foreach ($colors as $color)
                                                    <option value="{{$color->id}}">{{$color->colorType}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control show-tick" name="condition" required>
                                                <option value="">Select Condition</option>
                                                @foreach ($conditions as $condition)
                                                    <option value="{{$condition->id}}">{{$condition->conditionName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="row" style="margin-top: 50px;">
                                        <div class="col-md-6">
                                            <table class="table" id="emptbl">
                                                <tr>
                                                    <th>Vehicle Images</th>
                                                  
                                                </tr> 
                                              <div class="row">
                                                <!-- IMAGE OPTION -->

                                                <div class="col-6">
                                                     
                                                    <tr> 
                                                        <td id="col0">
                                                            <input class="form-control" type="file" name="productImages[]" required/>
                                                        </td> 
                                                        </td> 
                                                    </tr>  

                                                </div>
                                

                                              </div>
                                            </table> 
                                            <div>
                                                <button type="button" class="btn btn-primary"onclick="addRows()" >Add Image</button>
                                                <button type="button" class="btn btn-danger"onclick="deleteRows()" >Delete Image</button>
                                            </div>
                                        </div>


                                        {{-- FEATURES OPTIONS --}}
                                        <table id="emptb2">
                                            <tr>
                                               
                                                <th>Features</th> 
                                            
                                            </tr> 
                                            <tr> 
                                                
                                                <td id="col2"> 
                                                <select name="department[]" id="dept"> 
                                                <option value="0">Select Department</option> 
                                                <option value="1">Sales</option>
                                                <option value="2">IT</option>
                                                <option value="3">Warehouse</option>
                                                </select> 
                                                  
                                            </tr>  
                                        </table> 
                                        <table> 
                                            <tr> 
                                                <td><input type="button" value="Add Row" onclick="addRows2()" /></td> 
                                                <td><input type="button" value="Delete Row" onclick="deleteRows2()" /></td> 
                                               
                                            </tr>  
                                        </table> 



                                          
                                        <!-- Features Section 

                                    
                                        <div class="col-md-6">
                                            <table class="table" id="emptyf">
                                                <tr>
                                                    <th>Vehicle Features</th>
                                                    
                                                </tr> 
                                              <div class="row">
                                                <div class="col-6">
                                                     
                                                    <tr> 
                                                        <td id="col2">
                                                            <select class="form-control" name="productImages">
                                                                <option>Select  Feature</option>
                                                            </select>
                                                        </td> 
                                                       
                                                       
                                                 
                                                    </tr>  

                                                </div>
                                                

                                              </div>
                                            </table> 
                                            <div>
                                                <button class="btn btn-primary"onclick="addRows1()" >Add Feature</button>
                                                <button class="btn btn-danger"onclick="deleteRows1()" >Delete Feature</button>
                                            </div>
                                        </div>
                                    </div>
                                -->
    
                                    <div class="row">
                                    
                                        <div class="col-md-2">
                                            <div class="row" style="padding: 10px 10px" >
                                                <button type="submit" class="btn btn-primary ">Submit</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- CATEGORY MODAL -->
                <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" action="{{route('category.register')}}">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col">
                                            <label>Category Name</label>
                                            <input class="form-control" type="text" name="categoryName" placeholder="Category Name" required/>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" type="button" class="btn btn-primary waves-effect">Submit</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

                <!-- TRANSMITION MODAL -->
                <div class="modal fade" id="transmitionModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" action="{{route('transmition.register')}}">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col">
                                            <label>Transmition Name</label>
                                            <input class="form-control" type="text" name="transmitionName" placeholder="Transmition Name" required/>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" type="button" class="btn btn-primary waves-effect">Submit</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

                <!-- FUEL TYPE MODAL -->
                <div class="modal fade" id="fuelModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" action="{{route('fuel.register')}}">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col">
                                            <label>Fuel Name</label>
                                            <input class="form-control" type="text" name="fuelType" placeholder="Fuel Name" required/>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" type="button" class="btn btn-primary waves-effect">Submit</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

                <!-- CONDITION MODAL -->
                <div class="modal fade" id="condtionModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" action="{{route('conditions.register')}}">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col">
                                            <label>Vihecle Condition</label>
                                            <input class="form-control" type="text" name="condition" placeholder="Vihecle Condition" required>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" type="button" class="btn btn-primary waves-effect">Submit</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

                 <!-- VIHECLE COLOR MODAL -->
                 <div class="modal fade" id="colorModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" action="{{route('colors.register')}}">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col">
                                            <label>Vehicle Color</label>
                                            <input class="form-control" type="text" name="color" placeholder="Vehicle Colorx" required>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" type="button" class="btn btn-primary waves-effect">Submit</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

                <!-- YEARS MODAL -->
                <div class="modal fade" id="yearsModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" action="{{route('years.register')}}">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col">
                                            <label>Add Year</label>
                                            <input class="form-control" type="text" name="year" placeholder="Year" required/>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" type="button" class="btn btn-primary waves-effect">Submit</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

                <!-- PRODUCT TYPE MODAL -->
                <div class="modal fade" id="productTypeModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" action="{{route('productType.register')}}">
                                    @csrf
                                    <div class="row clearfix">
                                        <div class="col">
                                            <label>Vihecle Type</label>
                                            <input class="form-control" type="text" name="productType" placeholder="Vihecles Type" required/>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" type="button" class="btn btn-primary waves-effect">Submit</button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </body>

    <script type="text/javascript">
        function addRows(){ 
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            var cellCount = table.rows[0].cells.length; 
            var row = table.insertRow(rowCount);
            for(var i =0; i <= cellCount; i++){
                var cell = 'cell'+i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col'+i).innerHTML;
                cell.innerHTML=copycel;
                if(i == 3){ 
                    var radioinput = document.getElementById('col3').getElementsByTagName('input'); 
                    for(var j = 0; j <= radioinput.length; j++) { 
                        if(radioinput[j].type == 'radio') { 
                            var rownum = rowCount;
                            radioinput[j].name = 'gender['+rownum+']';
                        }
                    }
                }
            }
        }
        function addRows1(){ 
            var table1 = document.getElementById('emptyf');
            var rowCount = table1.rows.length;
            var cellCount = table1.rows[0].cells.length; 
            var row = table1.insertRow(rowCount);

            
            
            for(var i =0; i <= cellCount; i++){
                var cell = 'cell'+i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col'+i).innerHTML;
                cell.innerHTML=copycel;
                
            }

            
        }
        function deleteRows(){
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            if(rowCount > '2'){
                var row = table.deleteRow(rowCount-1);
                rowCount--;
            }
            else{
                alert('There should be atleast one row');
            }
        }
        function deleteRows1(){
            var table = document.getElementById('emptb2');
            var rowCount = table.rows.length;
            if(rowCount > '2'){
                var row = table.deleteRow(rowCount-1);
                rowCount--;
            }
            else{
                alert('There should be atleast one row');
            }
        }
        // ADDDING IMAGE ROW FN
 function addRows2(){ 
	var table = document.getElementById('emptb2');
	var rowCount = table.rows.length;
	var cellCount = table.rows[1].cells.length; 
	var row = table.insertRow(rowCount);
	for(var i =0; i <= cellCount; i++){
		var cell = 'cell'+i;
		cell = row.insertCell(i);
		var copycel = document.getElementById('col'+i).innerHTML;
		cell.innerHTML=copycel;
		if(i == 3){ 
			var radioinput = document.getElementById('col2').getElementsByTagName('input'); 
			for(var j = 0; j <= radioinput.length; j++) { 
				if(radioinput[j].type == 'radio') { 
					var rownum = rowCount;
					radioinput[j].name = 'gender['+rownum+']';
				}
			}
		}
	}
}
function deleteRows2(){
	var table = document.getElementById('emptb2');
	var rowCount = table.rows.length;
	if(rowCount > '2'){
		var row = table.deleteRow(rowCount-1);
		rowCount--;
	}
	else{
		alert('There should be atleast one row');
	}
}






        </script>
@endsection





