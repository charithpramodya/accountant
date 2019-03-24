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
							<th>Name</th>
							<th>Email</th>
							<th>Organization</th>
							<th>Contact</th>
							<th>Country</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
						<tr>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->organization}}</td>
							<td>{{$user->contact}}</td>
							<td>{{$user->country}}</td>
							<td><button class="btn btn-primary">{{$user->id}}</button></td>
						</tr>
						@endforeach
						
						
					
					</tbody>
					<tfoot>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Organization</th>
							<th>Contact</th>
							<th>Country</th>
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
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true
		})
	})
</script>
@endsection