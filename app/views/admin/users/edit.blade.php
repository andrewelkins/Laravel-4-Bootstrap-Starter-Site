@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
User Update ::
@parent
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

<form class="form-horizontal" method="post" action="/admin/users/{{$user->id}}/edit" autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />
	<!-- ./ csrf token -->

	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
			<!-- username -->
			<div class="control-group {{ $errors->has('username') ? 'error' : '' }}">
				<label class="control-label" for="username">Username</label>
				<div class="controls">
					<input type="text" name="username" id="username" value="{{ Input::old('username', $user->username) }}" />
					{{ $errors->first('username', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<!-- ./ username -->

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
					<select{{ ($user->id === Confide::user()->id ? ' disabled="disabled"' : '') }} name="activated" id="activated">
						<option value="1"{{ ($user->confirm() ? ' selected="selected"' : '') }}>{{ Lang::get('general.yes') }}</option>
						<option value="0"{{ ( ! $user->confirm() ? ' selected="selected"' : '') }}>{{ Lang::get('general.no') }}</option>
					</select>
					{{ $errors->first('activated', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<!-- ./ activation status -->

			<!-- Groups -->
			<div class="control-group {{ $errors->has('roles') ? 'error' : '' }}">
				<label class="control-label" for="groups">Roles</label>
				<div class="controls">
					<select name="roles[]" id="roles[]" multiple>
						@foreach ($roles as $role)
						<option value="{{ $role->id }}"{{ ( array_search($role->id, $user->currentRoleIds()) !== false && array_search($role->id, $user->currentRoleIds()) >= 0 ? ' selected="selected"' : '') }}>{{ $role->name }}</option>
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
                        <input type="checkbox" id="permissions[{{ $permissionId }}]" name="permissions[{{ $permissionId }}]" value="1"{{ ( ! empty($selectedPermissions[ $permissionId ]) ? ' checked="checked"' : '') }} />
                        {{ $permissionName }}
                    </label>
                    @endforeach

					<span class="help-block">
						A user has permissions from roles that it is given. If you want to specify a permission not contained in a rule, do so here.
					</span>
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
