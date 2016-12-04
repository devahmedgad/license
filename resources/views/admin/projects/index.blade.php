<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>MoTwreen Projects</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<br>
		<div class="container">
		<a href="{{Url('/')}}/projects/create" class="btn btn-success">Register New</a>
		<br>
		<br>
			<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th width="20%">Name</th>
					<th width="80%">Url</th>
					<th colspan="2">Options</th>
				</thead>
				<tbody>
				@foreach($projects as $project)
					<tr>
						<td>{{$i}}</td>
						<td>{{$project->name}}</td>
						<td>
							{{$project->url}}
							<br>
							<a href="javascript:;" class="showKey"> Show Key </a>
							<span style="display: none">
								<code>{!!$project->license_key!!}</code>
							</span>
						</td>
						<td><a href="{{Url('/')}}/projects/{{$project->id}}/edit" class="btn btn-warning">EDIT</a></td>
						<td>
							{!!Form::open(["action"=>['ProjectsCtrl@destroy',$project->id],'method'=>'DELETE'])!!}
								<button type="submit" onclick="return confirm('Are You Sure ?')" class="btn btn-danger">DELETE</button>
							{!!Form::close()!!}
						</td>
					</tr>
					<?php $i++; ?>
				@endforeach
				</tbody>
			</table>
				{!!$projects->render()!!}
		</div>
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
			$('.showKey').on('click',function(){
				$(this).hide();
				$(this).parent().find('span').fadeIn('slow');
			});
		</script>
	</body>
</html>