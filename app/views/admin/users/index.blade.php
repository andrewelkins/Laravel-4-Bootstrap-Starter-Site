@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: User Management
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>
		User Management

		<div class="pull-right">
			<a href="{{ URL::to('admin/users/create') }}" class="btn btn-small btn-info"><i class="icon-plus-sign icon-white"></i> Create</a>
		</div>
	</h3>
</div>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="span2">{{ Lang::get('admin/users/table.first_name') }}</th>
			<th class="span2">{{ Lang::get('admin/users/table.last_name') }}</th>
			<th class="span3">{{ Lang::get('admin/users/table.email') }}</th>
			<th class="span3">{{ Lang::get('admin/users/table.groups') }}</th>
			<th class="span2">{{ Lang::get('admin/users/table.activated') }}</th>
			<th class="span2">{{ Lang::get('admin/users/table.created_at') }}</th>
			<th class="span2">{{ Lang::get('table.actions') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $user)
		<tr>
			<td>{{ $user->first_name }}</td>
			<td>{{ $user->last_name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ implode(', ', array_map(function($group) { return $group->name; }, $user->groups->all())) }}</td>
			<td>{{ Lang::get('general.' . ($user->isActivated() ? 'yes' : 'no')) }}</td>
			<td>{{ $user->created_at() }}</td>
			<td>
				<a href="{{ URL::to('admin/users/' . $user->id . '/edit') }}" class="btn btn-mini">{{ Lang::get('button.edit') }}</a>

				@if (Sentry::getId() !== $user->id)
				<a href="{{ URL::to('admin/users/' . $user->id . '/delete') }}" class="btn btn-mini btn-danger">{{ Lang::get('button.delete') }}</a>
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{ $users->links() }}
@stop
