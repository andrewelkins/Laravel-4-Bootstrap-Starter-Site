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
				<div class="form-group {{{ $errors->has('title') ? 'error' : '' }}}">
					<label class="control-label col-lg-2" for="title">{{{ Lang::get('admin/navigation/table.title') }}}</label>
					<div class="col-lg-6">
						{{ Form::text('title', Input::old('title', isset($navigation) ? $navigation->title : null), array('class' => 'form-control input-sm')) }}
						<span class="help-inline">{{{ $errors->first('title', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ Title -->

				<!-- navigation parent -->
				<div class="form-group {{{ $errors->has('parent') ? 'error' : '' }}}">
					<label class="control-label col-lg-2" for="parent">{{{ Lang::get('admin/navigation/table.parent') }}}</label>
					<div class="col-lg-6">
						{{ Form::select('parent', array('' => 'Select Page') + $pageList, isset($navigation) ? $navigation->parent  : '', array('class' => 'form-control input-sm')) }}
						<span class="help-inline">Do not select if this navigation is not under other navigation.</span>
						<span class="help-inline">{{{ $errors->first('parent', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ navigation parent -->

				<!-- navigation parent -->
				<div class="form-group {{{ $errors->has('link_type') ? 'error' : '' }}}">
					<label class="control-label col-lg-2" for="link_type">{{{ Lang::get('admin/navigation/table.link_type') }}}</label>
					<div class="col-lg-6">
						{{ Form::select('link_type', array('page' => 'Page', 'url' => 'External Link', 'uri' => 'Site Link'), Input::old('link_type', isset($navigation) ? $navigation->link_type : ''), array('id' => 'link_type', 'class' => 'form-control input-sm')) }}
						<span class="help-inline">{{{ $errors->first('link_type', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ navigation link_type -->

				<!-- navigation page_id -->
				<div id="page" style="display: none;" class="form-group link_type {{{ $errors->has('page_id') ? 'error' : '' }}}">
					<label class="control-label col-lg-2" for="page_id">{{{ Lang::get('admin/navigation/table.page') }}}</label>
					<div class="col-lg-6">
						{{ Form::select('page_id', array('' => 'Select Page') + $pageList, Input::old('page_id', isset($navigation) ? $navigation->page_id : ''), array('class' => 'form-control input-sm')) }}
						<span class="help-inline">{{{ $errors->first('page_id', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ navigation page_id -->

				<!-- URL -->
				<div id="url" style="display: none;" class="form-group link_type {{{ $errors->has('url') ? 'error' : '' }}}">
					<label class="control-label col-lg-2" for="url">{{{ Lang::get('admin/navigation/table.url') }}}</label>
					<div class="col-lg-6">
						{{ Form::text('url', Input::old('url', isset($navigation) ? $navigation->url : null), array('class' => 'form-control input-sm')) }}
						<span class="help-inline">{{{ $errors->first('url', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ URL -->

				<!-- URL -->
				<div id="uri" style="display: none;" class="form-group link_type {{{ $errors->has('uri') ? 'error' : '' }}}">
					<label class="control-label col-lg-2" for="uri">{{{ Lang::get('admin/navigation/table.uri') }}}</label>
					<div class="col-lg-6">
						{{ Form::text('uri', Input::old('uri', isset($navigation) ? $navigation->uri : null), array('class' => 'form-control input-sm')) }}
						<span class="help-inline">{{{ $errors->first('uri', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ URL -->

				<!-- navigation navigation_group_id -->
				<div class="form-group {{{ $errors->has('navigation_group_id') ? 'error' : '' }}}">
					<label class="control-label col-lg-2" for="navigation_group_id">{{{ Lang::get('admin/navigation/table.navigation_group') }}}</label>
					<div class="col-lg-6">
						{{ Form::select('navigation_group_id', array('' => 'Select Group') + (array)$navigationGroupList, Input::old('page_id', isset($navigation) ? $navigation->navigation_group_id : ''), array('class' => 'form-control input-sm')); }}
						<span class="help-inline">{{{ $errors->first('navigation_group_id', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ navigation navigation_group_id -->

				<!-- navigation target -->
				<div class="form-group {{{ $errors->has('target') ? 'error' : '' }}}">
					<label class="control-label col-lg-2" for="target">{{{ Lang::get('admin/navigation/table.target') }}}</label>
					<div class="col-lg-6">
						{{ Form::select('target', array('selected'=>'Self', '_blank' => 'Blank Page'), Input::old('page_id', isset($navigation) ? $navigation->target : ''), array('class' => 'form-control input-sm')) }}
						<span class="help-inline">{{{ $errors->first('target', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ navigation target -->

				<!-- Css Class -->
				<div class="form-group {{{ $errors->has('class') ? 'error' : '' }}}">
					<label class="control-label col-lg-2" for="class">{{{ Lang::get('admin/navigation/table.class') }}}</label>
					<div class="col-lg-6">
						{{ Form::text('class', Input::old('class', isset($navigation) ? $navigation->class : null), array('class' => 'form-control input-sm')) }}
						<span class="help-inline">The class will be appended on navigation class attribute</span>
						<span class="help-inline">{{{ $errors->first('class', ':message') }}}</span>
					</div>
				</div>
				<!-- ./ Css Class -->

			</div>
			<!-- ./ general tab -->

		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-lg-6 col-lg-offset-2">
				<element class="btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn">Reset</button>
				<button type="submit" class="btn btn-success">Save</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
