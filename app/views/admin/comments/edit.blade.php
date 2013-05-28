@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
Blog Comment Update ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>
		Blog Comment Update

		<div class="pull-right">
			<a href="{{{ URL::to('admin/comments') }}}" class="btn btn-small btn-inverse"><i class="icon-circle-arrow-left icon-white"></i> Back</a>
		</div>
	</h3>
</div>

<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
</ul>
<!-- ./ tabs -->

<form class="form-horizontal" method="post" action="" autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->

	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">

			<!-- Content -->
			<div class="control-group {{{ $errors->has('content') ? 'error' : '' }}}">
				<label class="control-label" for="content">Content</label>
				<div class="controls">
					<textarea class="full-width span10 wysihtml5" name="content" value="content" rows="10">{{{ Input::old('content', $comment->content) }}}</textarea>
					{{{ $errors->first('content', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ content -->
		</div>
		<!-- ./ general tab -->
	</div>
	<!-- ./ tabs content -->

	<!-- Form Actions -->
	<div class="control-group">
		<div class="controls">
			<a class="btn btn-link" href="{{{ URL::to('admin/comments') }}}">Cancel</a>
			<button type="reset" class="btn">Reset</button>
			<button type="submit" class="btn btn-success">Update</button>
		</div>
	</div>
	<!-- ./ form actions -->
</form>
@stop
