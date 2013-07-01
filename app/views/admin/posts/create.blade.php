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
        <li><a href="#tab-meta-data" data-toggle="tab">Meta Data</a></li>
	</ul>
	<!-- ./ tabs -->

	{{-- Create a post form --}}
	<!-- Form -->
	{{ Former::horizontal_open()
		->id('create')
        ->rules($rules)
		->method('POST')
		->action('admin/posts') }}

	{{ Former::token() }}

		@include('admin.posts.form')

	{{ Former::close() }}
	<!-- ./ form -->

@stop

{{-- Extra JavaScripts --}}
@section('scripts')
<script type="text/javascript">
	$('.wysihtml5').wysihtml5();
    $(prettyPrint);
</script>
@stop