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

	{{-- Edit a post form --}}
	<!-- Form -->
	{{ Former::horizontal_open()
		->id('edit')
		->rules($rules)
		->method('PUT')
		->action('admin/posts/' . $post->id) }}

	{{ Former::token() }}

	{{-- For some weird reason "Former::populate($post)" does not work here!! No clue why need to look into --}}

	{{-- Dirty Fix: --}}
	{{ Former::populateField('title', $post->title) }}
	{{ Former::populateField('slug', $post->slug) }}
	{{ Former::populateField('content', $post->content) }}
	{{ Former::populateField('meta_title', $post->meta_title) }}
	{{ Former::populateField('meta_description', $post->meta_description) }}
	{{ Former::populateField('meta_keywords', $post->meta_keywords) }}


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