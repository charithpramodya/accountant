@extends('user.layout.auth')

@section('content')
	<div>
		<form method="POST" enctype="multipart/form-data" action="{{Route('post-upload')}}">

			{{ csrf_field() }}
			<label>Files</label>
			<input type="file" name="files[]" multiple="true"> 

			<input name="submit" type="submit">
		</form>

	</div>
@endsection