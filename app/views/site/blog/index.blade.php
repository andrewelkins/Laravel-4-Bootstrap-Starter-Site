@extends('site.layouts.default')

{{-- Content --}}
@section('content')
@foreach ($posts as $post)
<div class="row">
	<div class="span8">
		<!-- Post Title -->
		<div class="row">
			<div class="span8">
				<h4><strong><a href="{{ $post->url() }}">{{ Str::title($post->title) }}</a></strong></h4>
			</div>
		</div>
		<!-- ./ post title -->

		<!-- Post Content -->
		<div class="row">
			<div class="span2">
				<a href="{{ $post->url() }}" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
			</div>
			<div class="span6">
				<p>
					{{ Str::limit($post->content, 200) }}
				</p>
				<p><a class="btn btn-mini" href="{{ $post->url() }}">Read more</a></p>
			</div>
		</div>
		<!-- ./ post content -->

		<!-- Post Footer -->
		<div class="row">
			<div class="span8">
				<p></p>
				<p>
					<i class="icon-user"></i> by <span class="muted">{{ $post->author->first_name }}</span>
					| <i class="icon-calendar"></i> <!--Sept 16th, 2012-->{{ $post->date() }}
					| <i class="icon-comment"></i> <a href="{{ $post->url() }}#comments">{{ $post->comments()->count() }} Comments</a>
				</p>
			</div>
		</div>
		<!-- ./ post footer -->
	</div>
</div>

<hr />
@endforeach

{{ $posts->links() }}

@stop
