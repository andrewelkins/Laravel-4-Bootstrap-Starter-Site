@extends('frontend.user.template')

{{-- Extra CSS styles --}}
@section('syles')
	<style type="text/css"></style>
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>Edit your profile</h3>
	</div>

	<!-- Tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	</ul>
	<!-- ./ tabs -->

	{{-- Edit a profile form --}}
	<!-- Form -->
	{{ Former::horizontal_open()
		->id('edit')
		->rules($rules)
		->method('POST')
		->action('user/edit') }}

	{{ Former::token() }}

	{{ Former::populate($user) }}

		@include('frontend.user.form')

	{{ Form::close() }}
	<!-- ./ form -->
@stop

{{-- Extra JavaScripts --}}
@section('scripts')
	<script type="text/javascript"></script>
@stop