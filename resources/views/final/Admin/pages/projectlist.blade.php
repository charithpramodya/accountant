@extends('final.Admin.layout.admin')

@section('page-heading')
Users
@endsection

@section('page-name')
Blocked Users
@endsection

@section('content')
<div class="row">
	<div class="col-md-12 col-xs-12">
		<div class="box box-primary">
			<div class="box-body">
				<table id="newusers" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>User Name</th>
							<th>User Email</th>
							<th>Project Name</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($projects as $project)
						<tr>
							<td>{{$project->user->name}}</td>
							<td>{{$project->user->email}}</td>
							<td>{{$project->name}}</td>
							<td>{{$project->description}}</td>
							
							<td>
								<form method="POST" action="{{Route('show-admin-project')}}" >
									{{ csrf_field() }}
									<input type="hidden" name="id" value="{{$project->id}}">
									<input type="submit" name="submit" class="btn btn-primary">
									
								</form>
							</td>
						</tr>
						@endforeach
						
						
					
					</tbody>
					<tfoot>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>NIC</th>
							<th>Contact</th>
							<th>Action</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- /.row -->
<!-- Main row -->
<div class="row">
	
</div>

@endsection

@section('scripts')
<script type="text/javascript">
	$(function () {
		
		$('#newusers').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true
		})
	})
</script>
@endsection