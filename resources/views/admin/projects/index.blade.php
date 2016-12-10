<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>MoTwreen Projects</title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<br>
		<br>
		<div class="container ">
			@if (Session::has('msg'))
			<div class="alert alert-success">{{ Session::get('msg') }}</div>
			@endif
			<a href="{{Url('/')}}/projects/create" class="btn btn-success">Register New</a>
			<br>
			<br>
			@if($request->has('q'))
				<a href="{{Url('/')}}/projects" class="btn btn-info"> <- Back</a>
			<br>
			<br>
			@endif
			@if ($projects->total() > 0)
			<div id="imaginary_container">
				{!! Form::open() !!}
				<div class="input-group stylish-input-group">
					<input type="text" value="{{@$request->q}}" id="search-input" style="height: 37px"  class="form-control" name="q" placeholder="You Can Search By ... [ Url , name , status ]" >
					<span class="input-group-addon">
						<button type="submit" id='btnSendSearch'>
						<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
				{!! Form::close() !!}
			</div>
			<br />
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Number of licenses :( <span style="color:#000">{{ $projects->total() }} </span> )
					|   Active licenses : ( {{ $numOflicensesActive }} ) |  Non-active licenses : ( <span style="color:red">{{ $numOflicensesDisActive}} </span> )
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<tr>
							<th>#</th>
							<th width="20%">Name</th>
							<th width="80%">Url</th>
							<th colspan="3">Options</th>
						</tr>
						@foreach($projects as $project)
						<tr @if($project->status == 0) {{"style=background-color:#eee"}} @endif>
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
							@if($project->status == 0)
							<td><a href="{{Url('/')}}/projects/switch/{{$project->id}}" class="btn btn-info">ACTIVATE</a></td>
							@else
							<td><a href="{{Url('/')}}/projects/switch/{{$project->id}}" class="btn btn-success">DEACTIVATE</a></td>
							@endif
							<td>
								{!!Form::open(["action"=>['ProjectsCtrl@destroy',$project->id],'method'=>'DELETE'])!!}
								<button type="submit" onclick="return confirm('Are You Sure ?')" class="btn btn-danger">DELETE</button>
								{!!Form::close()!!}
							</td>
						</tr>
						<?php $i++ ;?>
						@endforeach
					</table>
				{!!$projects->appends(['q'=>@$request->q])->render()!!}
				</div>
			</div>
			@else
			<div class="alert alert-info"> Sorry , No Data To show </div>
		</div>
		@endif
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
			$('.showKey').on('click',function(){
				$(this).hide();
				$(this).parent().find('span').fadeIn('slow');
			});

			 $('#btnSendSearch').on('click',function(e) {
				e.preventDefault() ;
				if($('#search-input').val().trim() !== '')
				{
					window.location = '{{Url("/")}}/projects/?q=' + $('#search-input').val().trim();
				}
		    });
		</script>
	</body>
</html>