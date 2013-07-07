@extends('frontend.templates.default')

{{-- Extra CSS styles --}}
@section('styles')
	<style type="text/css"></style>
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>{{ $meta['title'] }}</h3>
	</div>

<div class="span6">
    <div class="formy well">
	{{-- Login form --}}
	<!-- Form -->
	{{ Former::horizontal_open()
		->id('login')
		->method('POST')
		->action('user/login') }}

	{{ Former::token() }}

		<!-- username -->
		{{ Former::text('username')->label('Username or Email')->prependIcon('user') }}
		<!-- ./ username -->

		<!-- Password -->
		{{ Former::password('password')->prependIcon('lock') }}
		<!-- ./ password -->

		<!-- Form Actions -->
		{{ Former::actions()
		    ->primary_submit('Submit')
		    ->inverse_reset('Reset') }}
		<!-- ./ form actions -->

	{{ Former::close() }}
    </div>
</div>
@stop

{{-- Extra JavaScripts --}}
@section('scripts')
	<script type="text/javascript"></script>
@stop