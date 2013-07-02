<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<!-- ./ nav-collapse -->
			<div class="nav-collapse collapse">

				<ul class="nav">
					<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">Home</a></li>
				</ul>

                <ul class="nav pull-right">
                    @if (Auth::check())

	                    @if (Auth::user()->hasRole('admin'))
	                    	<li><a href="{{{ URL::to('admin') }}}">Admin Panel</a></li>
	                    @endif

	                    <li><a href="{{{ URL::to('user') }}}">{{{ Auth::user()->username }}}'s profile</a></li>

	                    <li><a href="{{{ URL::to('user/logout') }}}">Logout</a></li>

	                @else
	                    <li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">Login</a></li>

	                    <li {{ (Request::is('user/register') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">Sign Up</a></li>
                    @endif
                </ul>

			</div>
			<!-- ./ nav-collapse -->
		</div>
	</div>
</div>