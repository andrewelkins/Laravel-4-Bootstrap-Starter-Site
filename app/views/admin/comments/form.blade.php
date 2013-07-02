<!-- Tabs Content -->
<div class="tab-content">
	<!-- General tab -->
	<div class="tab-pane active" id="tab-general">

		<!-- Content -->
		{{ Former::textarea('content')->rows(15)->class('full-width span10 wysihtml5') }}
		<!-- ./ content -->

	</div>
	<!-- ./ general tab -->
</div>
<!-- ./ tabs content -->

<!-- Form Actions -->
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset') }}
<!-- ./ form actions -->