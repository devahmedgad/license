<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Register New License</title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<br>
		<div class="container">
			{!! Form::model($projects,['method' => 'PATCH', 'action' => ['ProjectsCtrl@update',$projects->id], 'class' => 'form-horizontal']) !!}
				@include('admin.projects._form')

				<div class="btn-group pull-right">
				    {!! Form::submit("Edit", ['class' => 'btn btn-success']) !!}
				</div>
			{!! Form::close() !!}
		</div>
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>