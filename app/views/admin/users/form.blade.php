<!-- Tabs Content -->
<div class="tab-content">

	<!-- General tab -->
	<div class="tab-pane active" id="tab-general">

		<!-- username -->
		<div class="control-group {{{ $errors->has('username') ? 'error' : '' }}}">
			{{ Form::label('username', 'Username', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('username') }}
				{{ $errors->first('username', '<span class="help-inline">:message</span>') }}
			</div>
		</div>
		<!-- ./ username -->

		<!-- Email -->
		<div class="control-group {{{ $errors->has('email') ? 'error' : '' }}}">
			{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('email') }}
				{{ $errors->first('email', '<span class="help-inline">:message</span>') }}
			</div>
		</div>
		<!-- ./ email -->

		<!-- Password -->
		<div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
			{{ Form::label('password', 'Password', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::password('password') }}
				{{ $errors->first('password', '<span class="help-inline">:message</span>') }}
			</div>
		</div>
		<!-- ./ password -->

		<!-- Password Confirm -->
		<div class="control-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
			{{ Form::label('password_confirmation', 'Password Confirm', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::password('password_confirmation') }}
				{{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}
			</div>
		</div>
		<!-- ./ password confirm -->

		<!-- Activation Status -->
		<div class="control-group {{{ $errors->has('activated') || $errors->has('confirm') ? 'error' : '' }}}">
			{{ Form::label('confirmed', 'Activate User?', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::select('confirmed', array('1' => Lang::get('general.yes'), '0' => Lang::get('general.no'))) }}
				{{ $errors->first('confirmed', '<span class="help-inline">:message</span>') }}
			</div>
		</div>
		<!-- ./ activation status -->

		<!-- Groups -->
		<div class="control-group {{{ $errors->has('roles') ? 'error' : '' }}}">
			{{ Form::label('roles', 'Roles', array('class' => 'control-label')) }}
			<div class="controls">
				<select name="roles[]" id="roles[]" multiple>
					@if (Request::is('*/edit'))
					@foreach ($roles as $role)
					<option value="{{{ $role->id }}}"{{{ ( array_search($role->id, $user->currentRoleIds()) !== false && array_search($role->id, $user->currentRoleIds()) >= 0 ? ' selected="selected"' : '') }}}>{{{ $role->name }}}</option>
					@endforeach
					@else
					@foreach ($roles as $role)
					<option value="{{{ $role->id }}}">{{{ $role->name }}}</option>
					@endforeach
					@endif


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
		<element class="btn-cancel close_popup">Cancel</element>
		{{ Form::reset('Reset', array('class' => 'btn')) }}
		{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
	</div>
</div>
<!-- ./ form actions -->