@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
Role Management ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>
		Role Management

		<div class="pull-right">
			<a href="{{{ URL::to('admin/roles/create') }}}" class="btn btn-small btn-info"><i class="icon-plus-sign icon-white"></i> Create</a>
		</div>
	</h3>
</div>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="span6">{{{ Lang::get('admin/roles/table.name') }}}</th>
			<th class="span2">{{{ Lang::get('admin/roles/table.users') }}}</th>
			<th class="span2">{{{ Lang::get('admin/roles/table.created_at') }}}</th>
			<th class="span2">{{{ Lang::get('table.actions') }}}</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($roles as $role)
		<tr>
			<td>{{{ $role->name }}}</td>
			<td>{{{ $role->users()->count() }}}</td>
			<td>{{{ $role->getPresenter()->created_at() }}}</td>
			<td>
				<a href="{{{ URL::to('admin/roles/' . $role->id . '/edit') }}}" class="btn btn-mini">{{{ Lang::get('button.edit') }}}</a>
				<a href="{{{ URL::to('admin/roles/' . $role->id . '/delete') }}}" class="btn btn-mini btn-danger">{{{ Lang::get('button.delete') }}}</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{{ $roles->links() }}}
@stop
