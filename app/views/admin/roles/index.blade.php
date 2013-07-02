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

			<div class="pull-right">
				<a href="{{{ URL::to('admin/roles/create') }}}" class="btn btn-small btn-info iframe"><i class="icon-plus-sign icon-white"></i> Create</a>
			</div>
		</h3>
	</div>

	<table id="roles" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th class="span6">{{{ Lang::get('admin/roles/table.name') }}}</th>
				<th class="span2">{{{ Lang::get('admin/roles/table.users') }}}</th>
				<th class="span2">{{{ Lang::get('admin/roles/table.created_at') }}}</th>
				<th class="span2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
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
				oTable = $('#roles').dataTable( {
				"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
				"sPaginationType": "bootstrap",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('admin/roles/data') }}",
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

		// script to insert resource $id in the delete modal
		$(document).on("click", ".delForm", function () {
		     var idDel = $(this).data('id');
		     var titleDel = $(this).data('title');
		     $('#delete-modal #modal-title').html("{{ Lang::get('general.delete') }} " + titleDel + '?');
		     $('#delete-modal form#delete-form').attr('action', "{{ URL::to('admin/roles/') }}/" + idDel);
		     $("#delete-modal input[name='id']").val( idDel );
		});
	</script>
@stop