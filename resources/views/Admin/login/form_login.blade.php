<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.min.css') }}">
</head>
<body>
<div class="container" style="margin-top:40px;">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			@if(Request::get("notify") == "invalid")
			<div class="alert alert-danger">Sai email hoặc password</div>
			@endif
			@if(Request::get("notify") == "1")
			<div class="alert alert-danger">Tài khoản không thủ thẩm quyền vào trang Admin</div>
			@endif
			<div class="panel panel-success">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					<form method="post" action="{{ url('backend/login-post') }}">
					<!-- muốn submit được form trong laravel thì phải có thẻ sau -->
					@csrf
					<div class="row" style="margin-top:5px;">
						<div class="col-md-2">Email</div>
						<div class="col-md-9"><input type="email" name="email" required class="form-control"></div>
					</div>
					<div class="row" style="margin-top:5px;">
						<div class="col-md-2">Password</div>
						<div class="col-md-9"><input type="password" name="password" required class="form-control"></div>
					</div>
					<div class="row" style="margin-top:5px;">
						<div class="col-md-2"></div>
						<div class="col-md-9"><input type="submit" value="Login" class="btn btn-primary"> <input type="reset" value="Reset" class="btn btn-danger"></div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>