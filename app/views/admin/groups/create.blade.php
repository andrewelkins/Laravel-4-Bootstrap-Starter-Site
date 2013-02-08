@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Create a Group
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>
		Create a New Group

		<div class="pull-right">
			<a href="{{ URL::to('admin/groups') }}" class="btn btn-small btn-inverse"><i class="icon-circle-arrow-left icon-white"></i> Back</a>
		</div>
	</h3>
</div>

<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	<li><a href="#tab-permissions" data-toggle="tab">Permissions</a></li>
</ul>
<!-- ./ tabs -->

<form class="form-horizontal" method="post" action="" autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />
	<!-- ./ csrf token -->

	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- Tab General -->
		<div class="tab-pane active" id="tab-general">
			<!-- Name -->
			<div class="control-group {{ $errors->has('name') ? 'error' : '' }}">
				<label class="control-label" for="name">Name</label>
				<div class="controls">
					<input type="text" name="name" id="name" value="{{ Input::old('name') }}" />
					{{ $errors->first('name', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<!-- ./ name -->
		</div>
		<!-- ./ tab general -->

		<!-- Tab Permissions -->
		<div class="tab-pane" id="tab-permissions">
			<div class="control-group">
				<div class="controls">
					@foreach ($permissions as $permissionId => $permissionName)
					<label>
						<input type="hidden" id="permissions[{{ $permissionId }}]" name="permissions[{{ $permissionId }}]" value="0" />
						<input type="checkbox" id="permissions[{{ $permissionId }}]" name="permissions[{{ $permissionId }}]" value="1"{{ ( ! empty($selectedPermissions[ $permissionId ]) ? ' checked="checked"' : '') }} />
						{{ $permissionName }}
					</label>
					@endforeach
				</div>
			</div>
		</div>
		<!-- ./ tab permissions -->
	</div>
	<!-- ./ tabs content -->

	<!-- Form Actions -->
	<div class="control-group">
		<div class="controls">
			<a class="btn btn-link" href="{{ URL::to('admin/groups') }}">Cancel</a>
			<button type="reset" class="btn">Reset</button>
			<button type="submit" class="btn btn-success">Create Group</button>
		</div>
	</div>
	<!-- ./ form actions -->
</form>
@stop
