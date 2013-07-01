@extends('admin.templates.modal')

{{-- Extra CSS styles --}}
@section('syles')
<style type="text/css"></style>
@stop

{{-- Content --}}
@section('content')

	<div class="page-header">
		<h3>{{ $meta['title'] }}</h3>
	</div>

	<!-- Tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	</ul>
	<!-- ./ tabs -->

	{{-- Edit a user form --}}
	<!-- Form -->
	{{ Former::horizontal_open()
		->id('edit')
		->rules($rules)
		->method('PUT')
		->action('admin/users/' . $user->id) }}

	{{ Former::token() }}

	{{ Former::populate($user) }}

		@include('admin.users.form')

	{{ Former::close() }}
	<!-- ./ form -->

@stop

{{-- Extra JavaScripts --}}
@section('scripts')
<script type="text/javascript"></script>
@stop