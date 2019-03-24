@extends('final.Admin.layout.admin')

@section('page-heading')
Accountant
@endsection

@section('page-name')
Add Accountant
@endsection

@section('content')
<div class="row">
	<div class="col-md-12 col-xs-12">
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">

						<form method="POST" action="{{Route('register-post-accountant')}}">
							{{ csrf_field() }}

							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<label>Name</label>
								<input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="Enter Name">

								@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label>Email</label>
								<input name="email" id="email" type="email" class="form-control" value="{{ old('email') }}"  placeholder="Enter Email">
								@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>

							<div class="form-group{{ $errors->has('nic') ? ' has-error' : '' }}">
								<label>NIC</label>
								<input name="nic" id="nic" type="text" class="form-control" value="{{ old('nic') }}"  placeholder="Enter NIC">
								@if ($errors->has('nic'))
								<span class="help-block">
									<strong>{{ $errors->first('nic') }}</strong>
								</span>
								@endif
							</div>

							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label>Password</label>
								<input id="password" name="password" type="password" class="form-control"  placeholder="Enter password">
								@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
							<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								<label>Confirm Password</label>
								<input name="password_confirmation" type="password" class="form-control"   placeholder="Confirm Password">
								@if ($errors->has('password_confirmation'))
								<span class="help-block">
									<strong>{{ $errors->first('password_confirmation') }}</strong>
								</span>
								@endif
							</div>

							<div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
								<label>Contact</label>

								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-phone"></i>
									</div>
									<input id="contact" name="contact" type="text" class="form-control" value="{{ old('contact') }}" data-inputmask='"mask": "(999) 999-9999"' data-mask>

								</div>
								@if ($errors->has('contact'))
								<span class="help-block">
									<strong>{{ $errors->first('contact') }}</strong>
								</span>
								@endif
								<!-- /.input group -->
							</div>

							<div class="box-footer">
								<button  type="submit" class="btn btn-default">Cancel</button>
								<button name="submit" type="submit" class="btn btn-info pull-right">Sign in</button>
							</div>

						</form>
						<!-- /.form-group -->
					</div>
				</div>
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
	
</script>
@endsection