<!-- Tabs Content -->
<div class="tab-content">

	<!-- General tab -->
	<div class="tab-pane active" id="tab-general">

		<!-- Name -->
		{{ Former::text('name')->prependIcon('double-angle-up') }}
		<!-- ./ name -->

		<!-- Permissions -->
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
<!-- ./ permissions -->

	</div>
	<!-- ./ general tab -->

</div>
<!-- ./ tabs content -->

<!-- Form Actions -->
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset') }}
<!-- ./ form actions -->