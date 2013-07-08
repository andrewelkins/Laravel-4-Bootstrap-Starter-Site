<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li{{ (Request::is('admin') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin') }}}"><i class="icon-home icon-white"></i> Home</a></li>
					<li{{ (Request::is('admin/posts*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/posts') }}}"><i class="icon-list-alt icon-white"></i> Posts</a></li>
					<li{{ (Request::is('admin/comments*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/comments') }}}"><i class="icon-bullhorn icon-white"></i> Comments</a></li>
					<li class="dropdown{{ (Request::is('admin/users*|admin/roles*') ? ' active' : '') }}">
						<a class="dropdown-toggle" data-toggle="dropdown" href="{{{ URL::to('admin/users') }}}">
							<i class="icon-user icon-white"></i> Users <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li{{ (Request::is('admin/users*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/users') }}}"><i class="icon-user"></i> Users</a></li>
							<li{{ (Request::is('admin/roles*') ? ' class="active"' : '') }}><a href="{{{ URL::to('admin/roles') }}}"><i class="icon-user"></i> Roles</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav pull-right">
					<li><a href="{{{ URL::to('/') }}}">View Homepage</a></li>
					<li class="divider-vertical"></li>
					<li>
						<div class="btn-group">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-user"></i> {{{ Auth::user()->username }}}	<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="{{{ URL::to('user') }}}"><i class="icon-wrench"></i> Settings</a></li>
								<li class="divider"></li>
								<li><a href="{{{ URL::to('user/logout') }}}"><i class="icon-share"></i> Logout</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
			<!-- ./ nav-collapse -->
		</div>
		<!-- ./ container-fluid -->
	</div>
	<!-- ./ navbar-inner -->
</div>