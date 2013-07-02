{{-- Delete Resource Modal --}}
<div id="delete-modal" class="modal hide fade in" style="display: none; ">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3><div id="modal-title"><div></h3>
	</div>
	<div class="modal-body">
		{{-- Delete Resource Form --}}
		{{ Form::open(array('url' => '', 'method' => 'delete', 'class' => 'form-horizontal', 'id' => 'delete-form')) }}
		{{ Form::hidden('id', '') }}
	</div>
	<div class="modal-footer">
		<a href="#" class="btn-cancel" data-dismiss="modal">Cancel</a>
		<button type="submit" class="btn btn-danger">Delete</button>
		{{ Form::close() }}
	</div>
</div>