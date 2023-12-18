@extends("admin.layout")
@section("do-du-lieu-tu-view")
	<div class="col-md-12">  
	    <div class="panel panel-primary">
	    	
	        <div class="panel-heading">Add edit</div>
	        
	        <div class="panel-body">
	        <form method="post" action="{{ $action }}">
	        	@csrf
	            <!-- rows -->
	            <div class="row" style="margin-top:5px;">
	                <div class="col-md-2">Name</div>
	                <div class="col-md-10">
	                    <input type="text" value="{{ isset($record->name)?$record->name:'' }}" name="name" class="form-control" required>
	                </div>
	            </div>
	            <!-- end rows -->
	            <!-- rows -->
	            <div class="row" style="margin-top:5px;">
	                <div class="col-md-2">Email</div>
	                <div class="col-md-10">
	                    <input type="email" value="{{ isset($record->email)?$record->email:'' }}" name="email" @if(isset($record->email)) disabled @else required @endif class="form-control">
	                </div>
	            </div>
	            <!-- end rows -->
	            <!-- rows -->
	            <div class="row" style="margin-top:5px;">
	                <div class="col-md-2">Password</div>
	                <div class="col-md-10">
	                    <input type="password" name="password" @if(isset($record->email)) placeholder="Không đổi password thì không nhập thông tin vào ô textbox này" @else required @endif class="form-control">
	                </div>
	            </div>
	            <div class="row" style="margin-top:5px;">
	                <div class="col-md-2">Role</div>
	                	<select name="role" class="form-control" style="width:60px; margin-left: 15px;">
	                		<option>1</option>
		                	<option>2</option>
		                	<option>3</option>
	                	</select>
	                   
	                
	            </div>
	            <!-- end rows -->
	            <!-- rows -->
	            <div class="row" style="margin-top:5px;">
	                <div class="col-md-2"></div>
	                <div class="col-md-10">
	                    <input type="submit" value="Process" class="btn btn-primary">
	                </div>
	            </div>
	            <!-- end rows -->
	        </form>
	        </div>
	    </div>
	</div>
@endsection