@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
			<li><a href="#tab-meta-data" data-toggle="tab">Meta Data</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Edit Blog Form --}}
	{{ Form::model($post, array('route' => array('admin.posts.update', $post->id) , 'method' => 'put', 'class' => 'form-horizontal')) }}

		@include('admin.posts.form')

	{{ Form::close() }}
@stop
