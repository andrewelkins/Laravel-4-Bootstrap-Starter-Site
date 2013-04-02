@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('admin/user/title.user_management') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>
		User Management

		<div class="pull-right">
			<a href="{{{ URL::to('admin/users/create') }}}" class="btn btn-small btn-info"><i class="icon-plus-sign icon-white"></i> Create</a>
		</div>
	</h3>
</div>

<table class="table table-bordered table-hover">
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
		@foreach ($users as $user)
		<tr>
			<td>{{{ $user->username }}}</td>
			<td>{{{ $user->email }}}</td>
			<td>@foreach ($user->roles as $u)
                <div>{{ $u->name }}</div>
                @endforeach</td>
			<td>{{{ Lang::get('general.' . ($user->confirmed ? 'yes' : 'no')) }}}</td>
			<td>{{{ $user->getPresenter()->displayDate() }}}</td>
			<td>
				<a href="{{{ URL::to('admin/users/' . $user->id . '/edit') }}}" class="btn btn-mini">{{{ Lang::get('button.edit') }}}</a>

				@if (Auth::user()->id != $user->id )
				<a href="{{{ URL::to('admin/users/' . $user->id . '/delete') }}}" class="btn btn-mini btn-danger">{{{ Lang::get('button.delete') }}}</a>
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{{ $users->links() }}}
@stop
