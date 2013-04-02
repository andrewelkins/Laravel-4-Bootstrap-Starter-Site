@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
Blog Comment Delete ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>
		Blog Comment Delete

		<div class="pull-right">
			<a href="{{{ URL::to('admin/comments') }}}" class="btn btn-small btn-inverse"><i class="icon-circle-arrow-left icon-white"></i> Back</a>
		</div>
	</h3>
</div>

<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">Delete</a></li>
</ul>
<!-- ./ tabs -->
<form class="form-horizontal" method="post" action="" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden" name="id" value="{{ $comment->id }}" />
    <!-- ./ csrf token -->

    <!-- Form Actions -->
    <div class="control-group">
        <div class="controls">
            <a class="btn btn-link" href="{{{ URL::to('admin/comments') }}}">Cancel</a>
            <button type="submit" class="btn btn-danger">delete</button>
        </div>
    </div>
    <!-- ./ form actions -->
</form>
@stop
