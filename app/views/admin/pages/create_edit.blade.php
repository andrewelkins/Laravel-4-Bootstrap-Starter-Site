@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')

	{{-- Edit Page Form --}}
	<!-- <form class="form-horizontal" method="page" action="{{ URL::to('admin/pages/create') }}" > -->
	<form class="form-horizontal" method="post" action="@if (isset($page)){{ URL::to('admin/pages/' . $page->id . '/edit') }}@endif" >
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- Post Title -->
				<div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
					<label class="control-label" for="name">{{{ Lang::get('admin/pages/table.name') }}}</label>
					<div class="controls">
						<input type="text" name="name" id="name" value="{{{ Input::old('name', isset($page) ? $page->name : null) }}}" />
						{{{ $errors->first('name', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ page name -->

				<!-- Content -->
				<div class="control-group {{{ $errors->has('content') ? 'error' : '' }}}">
					<label class="control-label" for="content">{{{ Lang::get('admin/pages/table.content') }}}</label>
					<div class="controls">
						<textarea class="full-width span10 wysihtml5" name="content" value="content" rows="10">{{{ Input::old('content', isset($page) ? $page->content : null) }}}</textarea>
						{{{ $errors->first('content', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ content -->

				<!-- Status -->
				<div class="control-group {{{ $errors->has('status') ? 'error' : '' }}}">
					<label class="control-label" for="status">{{{ Lang::get('admin/pages/table.status') }}}</label>
					<div class="controls">
						<select name="status" id="status">
							<option value="1" {{{ isset($page->status) && $page->status == 1 ? 'selected="selected"' : ''}}}>Active</option>
							<option value="0" {{{ isset($page->status) && $page->status == 0 ? 'selected="selected"' : ''}}}>Inactive</option>
						</select>

					</div>
				</div>
				<!-- ./ Status -->
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
