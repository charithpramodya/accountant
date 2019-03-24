
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Alexander Pierce</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>

		
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<li class="treeview {{Request::is('admin/user/*') ? 'active' : ''}}">
				<a href="#">
					<i class="fa fa-dashboard"></i> <span>Users</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="{{Request::path()=='admin/user/adduser' ? 'active' : ''}}"><a href="{{url('admin\user\adduser')}}"><i class="fa fa-circle-o"></i>Add User</a></li>
					<li class="{{Request::path()=='admin/user/newusers' ? 'active' : ''}}"><a href="{{url('admin\user\newusers')}}"><i class="fa fa-circle-o"></i>New Users</a></li>
					<li class="{{Request::path()=='admin/user/userlist' ? 'active' : ''}}"><a href="{{url('admin\user\userlist')}}"><i class="fa fa-circle-o"></i>User List</a></li>
					<li class="{{Request::path()=='admin/user/blockedusers' ? 'active' : ''}}"><a href="{{url('admin\user\blockedusers')}}"><i class="fa fa-circle-o"></i>Blocked Users</a></li>
				</ul>

			</li>

			<li class="treeview {{Request::is('admin/accountant/*') ? 'active' : ''}}">
				<a href="#">
					<i class="fa fa-dashboard"></i> <span>Accountants</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="{{Request::path()=='admin/accountant/addaccountant' ? 'active' : ''}}"><a href="{{url('admin\accountant\addaccountant')}}"><i class="fa fa-circle-o"></i>Add Accountant</a></li>
					<li class="{{Request::path()=='admin/accountant/accountantlist' ? 'active' : ''}}"><a href="{{url('admin\accountant\accountantlist')}}"><i class="fa fa-circle-o"></i>Accountant List</a></li>
				</ul>
			</li>

			<li class="treeview {{Request::is('admin/projects/*') ? 'active' : ''}}">
				<a href="#">
					<i class="fa fa-dashboard"></i> <span>Projects</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="{{Request::path()=='admin/projects/projectlist' ? 'active' : ''}}"><a href="{{url('admin\projects\projectlist')}}"><i class="fa fa-circle-o"></i>Project List</a></li>
					<li><a href="index2.html"><i class="fa fa-circle-o"></i>Accountant List</a></li>
				</ul>
			</li>


			

		</ul>
	</section>
	<!-- /.sidebar -->
</aside>

