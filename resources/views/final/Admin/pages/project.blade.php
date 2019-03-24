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
		<div class="box-primary">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-th"></i> 
						{{$project->name}} 
						
						@switch($project->status)
						@case(0)
						<label><span class="label label-warning">Pending</span></label>
						@break

						@case(1)
						<label><span class="label label-success">Approved</span></label>
						@break
						@case(2)
						<label><span class="label label-danger">Rejected</span></label>
						@break
						@case(3)
						<label><span class="label label-nfo">Finished</span></label>
						@break
						@endswitch
					</h3>
					<label class="btn btn-primary btn-file btn-xs">
						Add Files 
						<input type="file" style="display: none;">
						
					</label>
					
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
					
					<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					The body of the box

					
					<div class="row">
						<div class="col-md-12">
							<!-- Custom Tabs (Pulled to the right) -->




							<div class="row">
								<div class="col-lg-4 col-xs-6">

									<!-- small box -->
									<div class="small-box bg-green">
										<div class="inner">
											<h3>53<sup style="font-size: 20px">%</sup></h3>

											<p>Bounce Rate</p>
										</div>
										<div class="icon">
											<i class="fa fa-dollar"></i>
										</div>
										<a href="#" class="small-box-footer">
											More info <i class="fa fa-arrow-circle-right"></i>
										</a>
									</div>
								</div>


								<div class="col-md-8 col-sm-12 col-xs-12">
									<dl class="dl-horizontal">
										<dt>Project Description</dt>
										<dd>{{$project->description}}</dd>

										<dt>Created At</dt>
										<dd>{{$project->created_at}}</dd>

										<dd>Donec id elit non mi porta gravida at eget metus.</dd>
										<dt>Malesuada porta</dt>
										<dd>Etiam porta sem malesuada magna mollis euismod.</dd>
										<dt>Felis euismod semper eget lacinia</dt>
										<dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
											sit amet risus.
										</dd>
									</dl>
								</div>

							</div>


							<div class="box-body chat">

								<div class="item">

									@foreach ($project->documents as $document)
									<img src="../../dist/img/png.jpg" alt="user image" class="online">
									<a href="{{$document->filepath}}">{{$document->filename}}</a>
									<hr>
									@endforeach

									
								</div>


								<hr>



							</div>






							
						</div>


					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="box box-solid">

								<!-- /.box-header -->
								<div class="box-body">
									<div class="box-group" id="accordion">
										<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
										<div class="panel box box-primary">
											<div class="box-header with-border">
												<i class="fa fa-comments-o"></i>
												<h4 class="box-title">

													<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
														Chat
													</a>

												</h4>

												<div class="box-tools pull-right" data-toggle="tooltip" title="Status">
													<div class="btn-group" data-toggle="btn-toggle">
														<button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
														</button>
														<button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
													</div>
												</div>
											</div>
											<div id="collapseOne" class="panel-collapse collapse">
												<div class="box-body">
													<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="box">

															<div class="box-body chat" id="chat-box">
																<!-- chat item -->
																<div class="item">
																	<img src="../../dist/img/user4-128x128.jpg" alt="user image" class="online">

																	<p class="message">
																		<a href="#" class="name">
																			<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
																			Mike Doe
																		</a>
																		I would like to meet you to discuss the latest news about
																		the arrival of the new theme. They say it is going to be one the
																		best themes on the market
																	</p>
																	<div class="attachment">
																		<h4>Attachments:</h4>

																		<p class="filename">
																			Theme-thumbnail-image.jpg
																		</p>

																		<div class="pull-right">
																			<button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
																		</div>
																	</div>
																	<!-- /.attachment -->
																</div>
																<!-- /.item -->
																<!-- chat item -->
																<div class="item">
																	<img src="../../dist/img/user3-128x128.jpg" alt="user image" class="offline">

																	<p class="message">
																		<a href="#" class="name">
																			<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
																			Alexander Pierce
																		</a>
																		I would like to meet you to discuss the latest news about
																		the arrival of the new theme. They say it is going to be one the
																		best themes on the market
																	</p>
																</div>
																<!-- /.item -->
																<!-- chat item -->
																<div class="item">
																	<img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">

																	<p class="message">
																		<a href="#" class="name">
																			<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
																			Susan Doe
																		</a>
																		I would like to meet you to discuss the latest news about
																		the arrival of the new theme. They say it is going to be one the
																		best themes on the market
																	</p>
																</div>
																<!-- /.item -->
															</div>
															<!-- /.chat -->
															<div class="box-footer">
																<div class="input-group">
																	<input class="form-control" placeholder="Type message...">

																	<div class="input-group-btn">
																		<button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="panel box box-danger">
											<div class="box-header with-border">
												<h4 class="box-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
														Collapsible Group Danger
													</a>
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse">
												<div class="box-body">

												</div>
											</div>
										</div>
										<div class="panel box box-success">
											<div class="box-header with-border">
												<h4 class="box-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
														Collapsible Group Success
													</a>
												</h4>
											</div>
											<div id="collapseThree" class="panel-collapse collapse">
												<div class="box-body">

												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
						</div>
						<!-- /.col -->

						<!-- /.col -->
					</div>

					
				</div>
				<!-- /.box-body -->
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

@endsection