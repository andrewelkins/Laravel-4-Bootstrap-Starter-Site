@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Group Management
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>
		Group Management

		<div class="pull-right">
			<a href="{{ URL::to('admin/groups/create') }}" class="btn btn-small btn-info"><i class="icon-plus-sign icon-white"></i> Create</a>
		</div>
	</h3>
</div>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="span6">{{ Lang::get('admin/groups/table.name') }}</th>
			<th class="span2">{{ Lang::get('admin/groups/table.users') }}</th>
			<th class="span2">{{ Lang::get('admin/groups/table.created_at') }}</th>
			<th class="span2">{{ Lang::get('table.actions') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($groups as $group)
		<tr>
			<td>{{ $group->name }}</td>
			<td>{{ $group->users()->count() }}</td>
			<td>{{ $group->created_at() }}</td>
			<td>
				<a href="{{ URL::to('admin/groups/' . $group->id . '/edit') }}" class="btn btn-mini">{{ Lang::get('button.edit') }}</a>
				<a href="{{ URL::to('admin/groups/' . $group->id . '/delete') }}" class="btn btn-mini btn-danger">{{ Lang::get('button.delete') }}</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{ $groups->links() }}
@stop
