@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
			<li><a href="#tab-permissions" data-toggle="tab">Permissions</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Edit Role Form --}}
	{{ Form::model($role, array('route' => array('admin.roles.update', $role->id) , 'method' => 'put', 'class' => 'form-horizontal')) }}

		@include('admin.roles.form')

	{{ Form::close() }}

@stop
