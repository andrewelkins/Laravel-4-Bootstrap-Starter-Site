@extends('admin/layouts.default')

{{-- Web site Title --}}
@section('title')
Blog Comment Management ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>
		Blog Comment Management
	</h3>
</div>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="span3">{{{ Lang::get('admin/comments/table.title') }}}</th>
			<th class="span3">{{{ Lang::get('admin/blogs/table.post_id') }}}</th>
			<th class="span2">{{{ Lang::get('admin/users/table.username') }}}</th>
			<th class="span2">{{{ Lang::get('admin/comments/table.created_at') }}}</th>
			<th class="span2">{{{ Lang::get('table.actions') }}}</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($comments as $comment)
		<tr>
			<td><a href="{{{ URL::to('admin/comments/'. $comment->id .'/edit') }}}">{{{ Str::limit($comment->content, 40, '...') }}}</a></td>
			<td><a href="{{{ URL::to('admin/blogs/'. $comment->post()->first()->id .'/edit') }}}">{{{ Str::limit($comment->post()->first()->title, 40, '...') }}}</a></td>
			<td><a href="{{{ URL::to('admin/users/'. $comment->user()->first()->id .'/edit') }}}">{{{ $comment->user()->first()->username }}}</a></td>
			<td>{{{ $comment->created_at() }}}</td>
			<td>
				<a href="{{{ URL::to('admin/comments/' . $comment->id . '/edit' ) }}}" class="btn btn-mini">{{{ Lang::get('button.edit') }}}</a>
				<a href="{{{ URL::to('admin/comments/' . $comment->id . '/delete' ) }}}" class="btn btn-mini btn-danger">{{{ Lang::get('button.delete') }}}</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{{ $comments->links() }}}
@stop
