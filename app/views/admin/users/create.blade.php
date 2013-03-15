@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
Create a User ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>
		Create a New User

		<div class="pull-right">
			<a href="{{{ URL::to('admin/users') }}}" class="btn btn-small btn-inverse"><i class="icon-circle-arrow-left icon-white"></i> Back</a>
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
            <!-- username -->
            <div class="control-group {{{ $errors->has('username') ? 'error' : '' }}}">
                <label class="control-label" for="username">Username</label>
                <div class="controls">
                    <input type="text" name="username" id="username" value="{{{ Input::old('username') }}}" />
                    {{{ $errors->first('username', '<span class="help-inline">:message</span>') }}}
                </div>
            </div>
            <!-- ./ username -->

			<!-- Email -->
			<div class="control-group {{{ $errors->has('email') ? 'error' : '' }}}">
				<label class="control-label" for="email">Email</label>
				<div class="controls">
					<input type="text" name="email" id="email" value="{{{ Input::old('email') }}}" />
					{{{ $errors->first('email', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ email -->

			<!-- Password -->
			<div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
				<label class="control-label" for="password">Password</label>
				<div class="controls">
					<input type="password" name="password" id="password" value="" />
					{{{ $errors->first('password', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ password -->

			<!-- Password Confirm -->
			<div class="control-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
				<label class="control-label" for="password_confirmation">Password Confirm</label>
				<div class="controls">
					<input type="password" name="password_confirmation" id="password_confirmation" value="" />
					{{{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ password confirm -->

			<!-- Activation Status -->
			<div class="control-group {{{ $errors->has('activated') ? 'error' : '' }}}">
				<label class="control-label" for="confirm">Activate User?</label>
				<div class="controls">
					<select name="confirm" id="confirm">
						<option value="1"{{{ (Input::old('confirm', 0) === 1 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>
						<option value="0"{{{ (Input::old('confirm', 0) === 0 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>
					</select>
					{{{ $errors->first('confirm', '<span class="help-inline">:message</span>') }}}
				</div>
			</div>
			<!-- ./ activation status -->

            <!-- Groups -->
            <div class="control-group {{{ $errors->has('roles') ? 'error' : '' }}}">
                <label class="control-label" for="roles">Roles</label>
                <div class="controls">
                    <select name="roles[]" id="roles[]" multiple>
                        @foreach ($roles as $role)
                        <option value="{{{ $role->id }}}"{{{ ( in_array($role->id, $selectedRoles) ? ' selected="selected"' : '') }}}>{{{ $role->name }}}</option>
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

	</div>
	<!-- ./ tabs content -->

	<!-- Form Actions -->
	<div class="control-group">
		<div class="controls">
			<a class="btn btn-link" href="{{{ URL::to('admin/users') }}}">Cancel</a>
			<button type="reset" class="btn">Reset</button>
			<button type="submit" class="btn btn-success">Create User</button>
		</div>
	</div>
	<!-- ./ form actions -->
</form>
@stop
