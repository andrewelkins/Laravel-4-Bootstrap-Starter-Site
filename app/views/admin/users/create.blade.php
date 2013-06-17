@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	{{-- Create User Form --}}
	{{ Form::open(array('url' => 'admin/users', 'method' => 'post', 'class' => 'form-horizontal')) }}

		@include('admin.users.form')

	{{ Form::close() }}

@stop