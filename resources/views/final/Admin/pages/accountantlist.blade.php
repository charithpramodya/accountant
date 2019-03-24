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
							<th>NIC</th>
							<th>Contact</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($accountants as $accountant)
						<tr>
							<td>{{$accountant->name}}</td>
							<td>{{$accountant->email}}</td>
							<td>{{$accountant->nic}}</td>
							<td>{{$accountant->tp}}</td>
							
							<td><button class="btn btn-primary">{{$accountant->id}}</button></td>
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
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true
		})
	})
</script>
@endsection