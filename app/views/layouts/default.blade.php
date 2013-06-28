<!DOCTYPE html>

<html lang="en">

@include('layouts.head')

<body>

	<!-- Navbar -->
	@yield('navbar')
	<!-- ./ navbar -->

	<!-- Container -->
	<div class="container">

		<!-- Notifications -->
		@include('layouts.notifications')
		<!-- ./ notifications -->

		<!-- Content -->
		@yield('content')
		<!-- ./ content -->

		<!-- Footer -->
		@yield('footer')
		<!-- ./ Footer -->

	</div>
	<!-- ./ container -->

	<!-- Javascripts -->
	{{-- Main Javascript Files --}}
	@yield('js')

	{{-- Extra JavaScripts --}}
	@section('scripts')
		<script type="text/javascript"></script>
	@show
	<!-- ./ javascripts -->

</body>

</html>