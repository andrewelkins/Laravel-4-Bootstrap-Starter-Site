@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Blog Management
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>
		Blog Management

		<div class="pull-right">
			<a href="{{ URL::to('admin/blogs/create') }}" class="btn btn-small btn-info"><i class="icon-plus-sign icon-white"></i> Create</a>
		</div>
	</h3>
</div>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="span6">{{ Lang::get('admin/blogs/table.title') }}</th>
			<th class="span2">{{ Lang::get('admin/blogs/table.comments') }}</th>
			<th class="span2">{{ Lang::get('admin/blogs/table.created_at') }}</th>
			<th class="span2">{{ Lang::get('table.actions') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($posts as $post)
		<tr>
			<td>{{ $post->title }}</td>
			<td>{{ $post->comments()->count() }}</td>
			<td>{{ $post->created_at() }}</td>
			<td>
				<a href="{{ URL::to('admin/blogs/' . $post->id . '/edit') }}" class="btn btn-mini">{{ Lang::get('button.edit') }}</a>
				<a href="{{ URL::to('admin/blogs/' . $post->id . '/delete') }}" class="btn btn-mini btn-danger">{{ Lang::get('button.delete') }}</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{ $posts->links() }}
@stop
