@extends('admin/layouts/modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Edit Blog Comment Form --}}
	{{ Form::model($comment, array('route' => array('admin.comments.update', $comment->id) , 'method' => 'put', 'class' => 'form-horizontal')) }}

		@include('admin.comments.form')

	{{ Form::close() }}
@stop