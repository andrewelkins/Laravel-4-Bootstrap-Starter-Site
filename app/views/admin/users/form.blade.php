<!-- Tabs Content -->
<div class="tab-content">

	<!-- General tab -->
	<div class="tab-pane active" id="tab-general">

		<!-- username -->
		{{ Former::text('username')->prependIcon('user') }}
		<!-- ./ username -->

		<!-- Email -->
		{{ Former::text('email')->prependIcon('envelope') }}
		<!-- ./ email -->

		<!-- Password -->
		{{ Former::password('password')->prependIcon('lock') }}
		<!-- ./ password -->

		<!-- Password Confirm -->
		{{ Former::password('password_confirmation')
					->label('Confirm Password')
					->prependIcon('repeat') }}
		<!-- ./ password confirm -->

		<!-- Activation Status -->
		{{ Former::select('confirmed')
				  	->options(array('0' => Lang::get('general.no'), '1' => Lang::get('general.yes') )) }}
		<!-- ./ activation status -->

		{{-- Former::select('roles')->fromQuery($roles, 'name', 'id') --}}
		{{-- Former::populateField('roles')--}}

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
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset') }}
<!-- ./ form actions -->