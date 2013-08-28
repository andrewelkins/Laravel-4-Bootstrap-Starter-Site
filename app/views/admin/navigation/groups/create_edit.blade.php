@extends('admin.layouts.modal')

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
				<!-- Post Title -->
				<div class="form-group {{{ $errors->has('title') ? 'error' : '' }}}">
					<label class="control-label col-lg-2" for="title">{{{ Lang::get('admin/navigation/table.title') }}}</label>
					<div class="col-lg-6">
						{{ Form::text('title', Input::old('title', isset($navigationGroup) ? $navigationGroup->title : null), array('class' => 'form-control input-sm')) }}
						{{{ $errors->first('title', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ navigationGroup abbrev -->

				<!-- Post Title -->
				<div class="form-group {{{ $errors->has('abbrev') ? 'error' : '' }}}">
					<label class="control-label col-lg-2" for="abbrev">{{{ Lang::get('admin/navigation/table.abbreviation') }}}</label>
					<div class="col-lg-6">
						{{ Form::text('abbrev', Input::old('abbrev', isset($navigationGroup) ? $navigationGroup->abbrev : null), array('class' => 'form-control input-sm')) }}
						{{{ $errors->first('abbrev', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ navigationGroup abbrev -->

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
