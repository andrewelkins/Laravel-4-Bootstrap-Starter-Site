<!-- Tabs Content -->
<div class="tab-content">

	<!-- Tab General -->
	<div class="tab-pane active" id="tab-general">

		<!-- Post Title -->
		<div class="control-group {{{ $errors->has('title') ? 'error' : '' }}}">
			{{ Form::label('title', 'Post Title', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('title') }}
				{{ $errors->first('title', '<span class="help-inline">:message</span>') }}
			</div>
		</div>
		<!-- ./ post title -->

		@if (Request::is('*/edit'))
			<!-- Post Slug -->
			<div class="control-group {{{ $errors->has('slug') ? 'error' : '' }}}">
				{{ Form::label('slug', 'Post Slug', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('slug') }}
					{{ $errors->first('slug', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
			<!-- ./ post slug -->
		@endif

		<!-- Content -->
		<div class="control-group {{{ $errors->has('content') ? 'error' : '' }}}">
			{{ Form::label('content', 'Content', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::textarea('content', null, array('class' => 'full-width span10 wysihtml5')) }}
				{{ $errors->first('content', '<span class="help-inline">:message</span>') }}
			</div>
		</div>
		<!-- ./ content -->
	</div>
	<!-- ./ tab general -->

	<!-- Meta Data tab -->
	<div class="tab-pane" id="tab-meta-data">
		<!-- Meta Title -->
		<div class="control-group {{{ $errors->has('meta-title') ? 'error' : '' }}}">
			{{ Form::label('meta-title', 'Meta Title', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('meta-title') }}
				{{ $errors->first('meta-title', '<span class="help-inline">:message</span>') }}
			</div>
		</div>
		<!-- ./ meta title -->

		<!-- Meta Description -->
		<div class="control-group {{{ $errors->has('meta-description') ? 'error' : '' }}}">
			{{ Form::label('meta-description', 'Meta Description', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('meta-description') }}
				{{ $errors->first('meta-description', '<span class="help-inline">:message</span>') }}
			</div>
		</div>
		<!-- ./ meta description -->

		<!-- Meta Keywords -->
		<div class="control-group {{{ $errors->has('meta-keywords') ? 'error' : '' }}}">
			{{ Form::label('meta-keywords', 'Meta Keywords', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('meta-keywords') }}
				{{ $errors->first('meta-keywords', '<span class="help-inline">:message</span>') }}
			</div>
		</div>
		<!-- ./ meta keywords -->

	</div>
	<!-- ./ meta data tab -->

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