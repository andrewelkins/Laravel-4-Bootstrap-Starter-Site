@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')

	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
			<li><a href="#tab-meta-data" data-toggle="tab">Meta Data</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create Post Form --}}
	{{ Form::open(array('url' => 'admin/posts', 'method' => 'post', 'class' => 'form-horizontal')) }}

		@include('admin.posts.form')

	{{ Form::close() }}

@stop