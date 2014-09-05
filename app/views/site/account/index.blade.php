@extends('site.layouts.default')

{{-- Content --}}
@section('content')
@foreach ($accounts as $account)
<div class="row">
	<div class="col-md-8">
		<!-- Post Title -->
		<div class="row">
			<div class="col-md-8">
				<h4><strong><a href="">{{ String::title($account->title) }}</a></strong></h4>
			</div>
		</div>
		<!-- ./ post title -->

		<!-- Post Content -->
		<div class="row">
			<div class="col-md-2">
				<a href="" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
			</div>
			<div class="col-md-6">
				<p>
					{{ String::tidy(Str::limit($account->content, 200)) }}
				</p>
				<p><a class="btn btn-mini btn-default" href="">Read more</a></p>
			</div>
		</div>
		<!-- ./ post content -->

		<!-- Post Footer -->
		<div class="row">
			<div class="col-md-8">
				<p></p>
				<p>
					<span class="glyphicon glyphicon-calendar"></span> <!--Sept 16th, 2012-->{{{ $account->date() }}}
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
