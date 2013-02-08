@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: User Update
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>
		User Update

		<div class="pull-right">
			<a href="{{ URL::to('admin/users') }}" class="btn btn-small btn-inverse"><i class="icon-circle-arrow-left icon-white"></i> Back</a>
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
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
			<!-- First Name -->
			<div class="control-group {{ $errors->has('first_name') ? 'error' : '' }}">
				<label class="control-label" for="first_name">First Name</label>
				<div class="controls">
					<input type="text" name="first_name" id="first_name" value="{{ Input::old('first_name', $user->first_name) }}" />
					{{ $errors->first('first_name', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<!-- ./ first name -->

			<!-- Last Name -->
			<div class="control-group {{ $errors->has('last_name') ? 'error' : '' }}">
				<label class="control-label" for="last_name">Last Name</label>
				<div class="controls">
					<input type="text" name="last_name" id="last_name" value="{{ Input::old('last_name', $user->last_name) }}" />
					{{ $errors->first('last_name', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<!-- ./ last name -->

			<!-- Email -->
			<div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
				<label class="control-label" for="email">Email</label>
				<div class="controls">
					<input type="text" name="email" id="email" value="{{ Input::old('email', $user->email) }}" />
					{{ $errors->first('email', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<!-- ./ email -->

			<!-- Password -->
			<div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
				<label class="control-label" for="password">Password</label>
				<div class="controls">
					<input type="password" name="password" id="password" value="" />
					{{ $errors->first('password', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<!-- ./ password -->

			<!-- Password Confirm -->
			<div class="control-group {{ $errors->has('password_confirmation') ? 'error' : '' }}">
				<label class="control-label" for="password_confirmation">Password Confirm</label>
				<div class="controls">
					<input type="password" name="password_confirmation" id="password_confirmation" value="" />
					{{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<!-- ./ password confirm -->

			<!-- Activation Status -->
			<div class="control-group {{ $errors->has('activated') ? 'error' : '' }}">
				<label class="control-label" for="activated">Activate User?</label>
				<div class="controls">
					<select{{ ($user->id === Sentry::getId() ? ' disabled="disabled"' : '') }} name="activated" id="activated">
						<option value="1"{{ ($user->isActivated() ? ' selected="selected"' : '') }}>{{ Lang::get('general.yes') }}</option>
						<option value="0"{{ ( ! $user->isActivated() ? ' selected="selected"' : '') }}>{{ Lang::get('general.no') }}</option>
					</select>
					{{ $errors->first('activated', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<!-- ./ activation status -->

			<!-- Groups -->
			<div class="control-group {{ $errors->has('groups') ? 'error' : '' }}">
				<label class="control-label" for="groups">Groups</label>
				<div class="controls">
					<select name="groups[]" id="groups[]" multiple>
						@foreach ($groups as $group)
						<option value="{{ $group->id }}"{{ (array_key_exists($group->id, $userGroups) ? ' selected="selected"' : '') }}>{{ $group->name }}</option>
						@endforeach
					</select>

					<span class="help-block">
						Select a group to assign to the user, remember that a user takes on the permissions of the group they are assigned.
					</span>
				</div>
			</div>
			<!-- ./ groups -->
		</div>
		<!-- ./ general tab -->

		<!-- Permissions tab -->
		<div class="tab-pane" id="tab-permissions">
			<div class="controls">
				<div class="control-group">
					@foreach ($permissions as $permissionId => $permissionName)
					<label>
						<input type="hidden" id="permissions[{{ $permissionId }}]" name="permissions[{{ $permissionId }}]" value="0" />
						<input type="checkbox" id="permissions[{{ $permissionId }}]" name="permissions[{{ $permissionId }}]" value="1"{{ (array_key_exists($permissionId, $userPermissions) ? ' checked="checked"' : '')}} />
						{{ $permissionName }}
					</label>
					@endforeach
				</div>
			</div>
		</div>
		<!-- ./ permissions tab -->
	</div>
	<!-- ./ tabs content -->

	<!-- Form Actions -->
	<div class="control-group">
		<div class="controls">
			<a class="btn btn-link" href="{{ URL::to('admin/users') }}">Cancel</a>
			<button type="reset" class="btn">Reset</button>
			<button type="submit" class="btn btn-success">Update User</button>
		</div>
	</div>
	<!-- ./ form actions -->
</form>
@stop
