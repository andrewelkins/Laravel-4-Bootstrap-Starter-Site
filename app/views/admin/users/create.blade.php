@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')

	<!-- Tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	</ul>
	<!-- ./ tabs -->

	{{-- Create User Form --}}
	{{ Form::open(array('url' => 'admin/users', 'method' => 'post', 'class' => 'form-horizontal')) }}

		@include('admin.users.form')

	{{ Form::close() }}

@stop