<!-- Tabs Content -->
<div class="tab-content">
	<!-- General tab -->
	<div class="tab-pane active" id="tab-general">

		<!-- Content -->
		<div class="control-group {{ $errors->has('content') ? 'error' : '' }}">
			{{ Form::label('content', 'Content', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::textarea('content', null, array('class' => 'full-width span10 wysihtml5')) }}
				{{ $errors->first('content', '<span class="help-inline">:message</span>') }}
			</div>
		</div>
		<!-- ./ content -->
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