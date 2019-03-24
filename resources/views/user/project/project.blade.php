@extends('user.layout.auth')

@section('content')
	<div>
		<form method="POST" action="{{Route('post-project')}}">

			{{ csrf_field() }}
			<label>Name</label>
			<input type="text" name="name">

			<label>Description</label>
			<input type="text" name="description">

			<input name="submit" type="submit">
		</form>

	</div>
		
		@foreach ($projects as $project)
    			<h4>{{$project->name}}</h4>
    			<ul>
    				@foreach ($project->documents as $document)
    					<li>{{$document->filename}}  : {{$document->usertype}}</li>
    			
				@endforeach
			</ul>
		@endforeach
	<div>
		

	</div>
@endsection