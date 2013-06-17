@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	{{-- Edit User Form --}}
	{{ Form::model($user, array('route' => array('admin.users.update', $user->id) , 'method' => 'put', 'class' => 'form-horizontal')) }}

		@include('admin.users.form')

	{{ Form::close() }}
@stop