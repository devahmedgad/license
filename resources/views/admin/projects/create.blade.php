<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Register New License</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<br>
		<div class="container">
			{!! Form::open(['method' => 'POST', 'action' => 'ProjectsCtrl@store', 'class' => 'form-horizontal']) !!}
				@include('admin.projects._form')
				<div class="btn-group pull-right">
					{!! Form::reset("Reset", ['class' => 'btn btn-default']) !!}
					{!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
				</div>
			{!! Form::close() !!}
		</div>
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>