@extends('frontend.user.template')

{{-- Extra CSS styles --}}
@section('syles')
	<style type="text/css"></style>
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>Create your profile</h3>
	</div>

	<!-- Tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	</ul>
	<!-- ./ tabs -->

	{{-- Create a user form --}}
	<!-- Form -->
	{{ Former::horizontal_open()
		->id('create')
		->rules($rules)
		->method('POST')
		->action('user') }}

	{{ Former::token() }}

		@include('frontend.user.form')

	{{ Former::close() }}
	<!-- ./ form -->
@stop

{{-- Extra JavaScripts --}}
@section('scripts')
	<script type="text/javascript"></script>
@stop