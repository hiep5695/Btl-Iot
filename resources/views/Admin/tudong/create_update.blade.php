@extends("admin.layout")
@section("do-du-lieu-tu-view")
	<div class="col-md-12">  
	    <div class="panel panel-danger">
	        <div class="panel-heading" style="background-color: #000;color: white;">Add edit</div>
	        <div class="panel-body">
	        	<!-- muốn upload được file thì phải có thuộc tính enctype="multipart/form-data" -->
	        <form method="post" action="{{ $action }}">
	        	@csrf
	            <!-- rows -->
	            <div class="row" style="margin-top:5px;">
	                <div class="col-md-2">Thời gian</div>
	                <div class="col-md-10">
	                    <input type="text" required value="{{ isset($record->thoigian)?$record->thoigian:'' }}" name="thoigian" class="form-control" required>
	                </div>
	            </div>
	            
	            
	            <div class="row" style="margin-top:5px;">
	                <div class="col-md-2"></div>
	                <div class="col-md-10">
	                    <input type="submit" value="Process" class="btn btn-danger">
	                </div>
	            </div>
	            <!-- end rows -->
	        </form>
	        </div>
	    </div>
	</div>
@endsection