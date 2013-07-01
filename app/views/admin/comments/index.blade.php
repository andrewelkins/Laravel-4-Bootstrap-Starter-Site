@extends('admin.templates.default')

{{-- Extra CSS styles --}}
@section('syles')
	<style type="text/css"></style>
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
			{{{ $meta['title'] }}}
		</h3>
	</div>

	<table id="comments" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th class="span3">{{{ Lang::get('admin/comments/table.title') }}}</th>
				<th class="span3">{{{ Lang::get('admin/posts/table.post_id') }}}</th>
				<th class="span2">{{{ Lang::get('admin/users/table.username') }}}</th>
				<th class="span2">{{{ Lang::get('admin/comments/table.created_at') }}}</th>
				<th class="span2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</thead>
	</table>

	@include('admin.modals.delete')

@stop

{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
		// global var for callback
		var oTable;

		// on document ready initialize datatables.
		$(document).ready(function() {
			oTable = $('#comments').dataTable( {
				"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
				"sPaginationType": "bootstrap",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('admin/comments/data') }}",
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({
	           			iframe:true,
	           			width:"80%",
	           			height:"80%",
	           			onCleanup: function() {
	         				oTable.fnReloadAjax();
	    				}
	           		});
	     		}
			});
		});

		$(document).on("click", ".delForm", function () {
		     var idDel = $(this).data('id');
		     $('#delete-modal #modal-title').html("{{ Lang::get('general.delete') }} comment?");
		     $('#delete-modal form#delete-form').attr('action', "{{ URL::to('admin/comments/') }}/" + idDel);
		     $("#delete-modal input[name='id']").val( idDel );
		});
	</script>
@stop