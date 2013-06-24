<!-- Tabs Content -->
<div class="tab-content">
	<!-- Tab General -->
	<div class="tab-pane active" id="tab-general">
		<!-- Name -->
		<div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
			{{ Form::label('name', 'Name', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('name') }}
				{{ $errors->first('name', '<span class="help-inline">:message</span>') }}
			</div>
		</div>
		<!-- ./ name -->
	</div>
	<!-- ./ tab general -->

	<!-- Permissions tab -->
	<div class="tab-pane" id="tab-permissions">
		<div class="controls">
			<div class="control-group">
				@foreach ($permissions as $permission)
				<label>
					@if (Request::is('*/edit'))
						<input type="hidden" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="0" />
						<input type="checkbox" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="1"{{{ (isset($permission['checked']) && $permission['checked'] == true ? ' checked="checked"' : '')}}} />
						{{{ $permission['display_name'] }}}
					@else
						<input type="hidden" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="0" />
						<input type="checkbox" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="1"/>
						{{{ $permission['display_name'] }}}
					@endif
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
		<element class="btn-cancel close_popup">Cancel</element>
		{{ Form::reset('Reset', array('class' => 'btn')) }}
		{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
	</div>
</div>
<!-- ./ form actions -->