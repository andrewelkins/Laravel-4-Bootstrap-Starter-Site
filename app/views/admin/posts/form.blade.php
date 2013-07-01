<!-- Tabs Content -->
<div class="tab-content">

	<!-- Tab General -->
	<div class="tab-pane active" id="tab-general">

		<!-- Post Title -->
		{{ Former::text('title') }}
		<!-- ./ post title -->

		@if (Request::is('*/edit'))
		<!-- Post Slug -->
		{{ Former::text('slug') }}
		<!-- ./ post slug -->
		@endif

		<!-- Content -->
		{{ Former::textarea('content')->rows(15)->class('full-width span10 wysihtml5') }}
		<!-- ./ content -->

	</div>
	<!-- ./ tab general -->

	<!-- Meta Data tab -->
	<div class="tab-pane" id="tab-meta-data">
		<!-- Meta Title -->
		{{ Former::text('meta-title') }}
		<!-- ./ meta title -->

		<!-- Meta Description -->
		{{ Former::text('meta-description') }}
		<!-- ./ meta description -->

		<!-- Meta Keywords -->
		{{ Former::text('meta-keywords') }}
		<!-- ./ meta keywords -->

	</div>
	<!-- ./ meta data tab -->

</div>
<!-- ./ tabs content -->

<!-- Form Actions -->
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset') }}
<!-- ./ form actions -->