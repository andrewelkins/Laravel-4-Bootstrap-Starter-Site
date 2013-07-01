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

	</div>
	<!-- ./ general tab -->

</div>
<!-- ./ tabs content -->

<!-- Form Actions -->
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset') }}
<!-- ./ form actions -->