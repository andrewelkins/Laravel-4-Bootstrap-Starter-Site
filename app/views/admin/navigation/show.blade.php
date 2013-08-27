@extends('layouts.scaffold')

@section('main')

<h1>Show Navigation_group</h1>

<p>{{ link_to_route('navigation_groups.index', 'Return to all navigation_groups') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Title</th>
				<th>Abbrev</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $navigation_group->title }}}</td>
					<td>{{{ $navigation_group->abbrev }}}</td>
                    <td>{{ link_to_route('navigation_groups.edit', 'Edit', array($navigation_group->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('navigation_groups.destroy', $navigation_group->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop