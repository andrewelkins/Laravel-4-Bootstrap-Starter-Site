@extends('admin.layouts.modal')

@section('scripts')
<script type="text/javascript">
$(function(){
	$("#link_type").change(function(){
		var link_type = $(this).val();
		$(".link_type").hide();
		$("#"+link_type).show();

	}).change();
});
</script>

@stop

{{-- Content --}}
@section('content')

	{{-- Edit Page Form --}}
	<!-- <form class="form-horizontal" method="post" action="{{ URL::to('admin/navigation/create') }}" > -->
	<form class="form-horizontal" method="post" action="@if (isset($navigationGroup)){{ URL::to('admin/navigation/groups/' . $navigationGroup->id . '/edit') }}@endif" >
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- Title -->
				<div class="control-group {{{ $errors->has('title') ? 'error' : '' }}}">
					<label class="control-label" for="title">{{{ Lang::get('admin/navigation/table.title') }}}</label>
					<div class="controls">
						{{ Form::text('title', Input::old('title', isset($navigation) ? $navigation->title : null)) }}
						<span class="help-inline">{{{ $errors->first('title', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ Title -->

				<!-- navigation parent -->
				<div class="control-group {{{ $errors->has('parent') ? 'error' : '' }}}">
					<label class="control-label" for="parent">{{{ Lang::get('admin/navigation/table.parent') }}}</label>
					<div class="controls">
						{{ Form::select('parent', array('' => 'Select Page') + $pageList, isset($navigation) ? $navigation->parent  : '') }}
						<span class="help-inline">{{{ $errors->first('parent', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ navigation parent -->

				<!-- navigation parent -->
				<div class="control-group {{{ $errors->has('link_type') ? 'error' : '' }}}">
					<label class="control-label" for="link_type">{{{ Lang::get('admin/navigation/table.link_type') }}}</label>
					<div class="controls">
						{{ Form::select('link_type', array('page' => 'Page', 'url' => 'External Link', 'uri' => 'Site Link'), Input::old('link_type', isset($navigation) ? $navigation->link_type : ''), array('id' => 'link_type')) }}
						<span class="help-inline">{{{ $errors->first('link_type', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ navigation link_type -->

				<!-- navigation page_id -->
				<div id="page" style="display: none;" class="control-group link_type {{{ $errors->has('page_id') ? 'error' : '' }}}">
					<label class="control-label" for="page_id">{{{ Lang::get('admin/navigation/table.page') }}}</label>
					<div class="controls">
						{{ Form::select('page_id', array('' => 'Select Page') + $pageList, Input::old('page_id', isset($navigation) ? $navigation->page_id : '')) }}
						<span class="help-inline">{{{ $errors->first('page_id', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ navigation page_id -->

				<!-- URL -->
				<div id="url" style="display: none;" class="control-group link_type {{{ $errors->has('url') ? 'error' : '' }}}">
					<label class="control-label" for="url">{{{ Lang::get('admin/navigation/table.url') }}}</label>
					<div class="controls">
						{{ Form::text('url', Input::old('url', isset($navigation) ? $navigation->url : null)) }}
						<span class="help-inline">{{{ $errors->first('url', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ URL -->

				<!-- URL -->
				<div id="uri" style="display: none;" class="control-group link_type {{{ $errors->has('uri') ? 'error' : '' }}}">
					<label class="control-label" for="uri">{{{ Lang::get('admin/navigation/table.uri') }}}</label>
					<div class="controls">
						{{ Form::text('uri', Input::old('uri', isset($navigation) ? $navigation->uri : null)) }}
						<span class="help-inline">{{{ $errors->first('uri', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ URL -->

				<!-- navigation navigation_group_id -->
				<div class="control-group {{{ $errors->has('navigation_group_id') ? 'error' : '' }}}">
					<label class="control-label" for="navigation_group_id">{{{ Lang::get('admin/navigation/table.navigation_group') }}}</label>
					<div class="controls">
						{{ Form::select('navigation_group_id', array('' => 'Select Group') + (array)$navigationGroupList, Input::old('page_id', isset($navigation) ? $navigation->navigation_group_id : '')); }}
						<span class="help-inline">{{{ $errors->first('navigation_group_id', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ navigation navigation_group_id -->

				<!-- navigation target -->
				<div class="control-group {{{ $errors->has('target') ? 'error' : '' }}}">
					<label class="control-label" for="target">{{{ Lang::get('admin/navigation/table.target') }}}</label>
					<div class="controls">
						{{ Form::select('target', array('selected'=>'Self', '_blank' => 'Blank Page'), Input::old('page_id', isset($navigation) ? $navigation->target : '')) }}
						<span class="help-inline">{{{ $errors->first('target', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ navigation target -->

				<!-- Css Class -->
				<div class="control-group {{{ $errors->has('class') ? 'error' : '' }}}">
					<label class="control-label" for="class">{{{ Lang::get('admin/navigation/table.class') }}}</label>
					<div class="controls">
						{{ Form::text('class', Input::old('class', isset($navigation) ? $navigation->class : null)) }}
						<span class="help-inline">{{{ $errors->first('class', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ Css Class -->

			</div>
			<!-- ./ general tab -->

		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="control-group">
			<div class="controls">
				<element class="btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn">Reset</button>
				<button type="submit" class="btn btn-success">Save</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
