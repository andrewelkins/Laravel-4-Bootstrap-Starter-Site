<!DOCTYPE html>

<html lang="en">

@include('layouts.head')

<body>
    <div id="wrap">
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


        </div>
        <!-- ./ container -->
        <div id="push"></div>
    </div>
    <!-- Footer -->
    @yield('footer')
    <!-- ./ Footer -->
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