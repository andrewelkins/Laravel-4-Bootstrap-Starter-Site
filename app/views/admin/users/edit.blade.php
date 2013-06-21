@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')

	<!-- Tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	</ul>
	<!-- ./ tabs -->

	{{-- Edit User Form --}}
	{{ Form::model($user, array('route' => array('admin.users.update', $user->id) , 'method' => 'put', 'class' => 'form-horizontal')) }}

		@include('admin.users.form')

	{{ Form::close() }}
@stop