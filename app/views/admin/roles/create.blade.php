@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
			<li><a href="#tab-permissions" data-toggle="tab">Permissions</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create Role Form --}}
	{{ Form::open(array('url' => 'admin/roles', 'method' => 'post', 'class' => 'form-horizontal')) }}

		@include('admin.roles.form')

	{{ Form::close() }}

@stop
