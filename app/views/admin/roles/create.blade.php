@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
			<li><a href="#tab-permissions" data-toggle="tab">Permissions</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create Role Form --}}
	<form class="form-horizontal" method="post" action="" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- Tab General -->
			<div class="tab-pane active" id="tab-general">
				<!-- Name -->
				<div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="name">Name</label>
                    <div class="col-md-10">
    					<input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name') }}}" />
    					{{ $errors->first('name', '<span class="help-inline">:message</span>') }}
                    </div>
				</div>
				<!-- ./ name -->
			</div>
			<!-- ./ tab general -->

	        <!-- Permissions tab -->
	        <div class="tab-pane" id="tab-permissions">
                <div class="form-group">
                    @foreach ($permissions as $permission)
                    <label>
                        <input class="control-label" type="hidden" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="0" />
                        <input class="form-control" type="checkbox" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="1"{{{ (isset($permission['checked']) && $permission['checked'] == true ? ' checked="checked"' : '')}}} />
                        {{{ $permission['display_name'] }}}
                    </label>
                    @endforeach
                </div>
	        </div>
	        <!-- ./ permissions tab -->
		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
            <div class="col-md-offset-2 col-md-10">
				<element class="btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-success">Create Role</button>
            </div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
