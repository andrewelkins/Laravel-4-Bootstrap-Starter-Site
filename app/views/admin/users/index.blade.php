@extends('admin.users.template')

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
				<a href="{{{ URL::to('admin/users/create') }}}" class="btn-create iframe"><i class="icon-plus-sign icon-white"></i> Create</a>
			</div>
		</h3>
	</div>

	<table id="users" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th class="span2">{{{ Lang::get('admin/users/table.username') }}}</th>
				<th class="span3">{{{ Lang::get('admin/users/table.email') }}}</th>
				<th class="span3">{{{ Lang::get('admin/users/table.roles') }}}</th>
				<th class="span2">{{{ Lang::get('admin/users/table.activated') }}}</th>
				<th class="span2">{{{ Lang::get('admin/users/table.created_at') }}}</th>
				<th class="span2">{{{ Lang::get('table.actions') }}}</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>

	@include('admin.layouts.modals.delete')

@stop

{{-- Extra JavaScripts --}}
@section('scripts')
	<script type="text/javascript">
		// global var for callback
		var oTable;

		// on document ready initialize datatables.
		$(function() {
			oTable = $('#users').dataTable( {
				"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
				"sPaginationType": "bootstrap",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('admin/users/data') }}",
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
		     $('#delete-modal form#delete-form').attr('action', "{{ URL::to('admin/users/') }}/" + idDel);
		     $("#delete-modal input[name='id']").val( idDel );
		});
	</script>
@stop