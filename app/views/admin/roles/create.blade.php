@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
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
				<div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
					<label class="control-label" for="name">Name</label>
					<div class="controls">
						<input type="text" name="name" id="name" value="{{{ Input::old('name') }}}" />
						{{{ $errors->first('name', '<span class="help-inline">:message</span>') }}}
					</div>
				</div>
				<!-- ./ name -->
			</div>
			<!-- ./ tab general -->

	        <!-- Permissions tab -->
	        <div class="tab-pane" id="tab-permissions">
	            <div class="controls">
	                <div class="control-group">
	                    @foreach ($permissions as $permission)
	                    <label>
	                        <input type="hidden" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="0" />
	                        <input type="checkbox" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="1"{{{ (isset($permission['checked']) && $permission['checked'] == true ? ' checked="checked"' : '')}}} />
	                        {{{ $permission['display_name'] }}}
	                    </label>
	                    @endforeach
	                </div>
	            </div>
	        </div>
	        <!-- ./ permissions tab -->
		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="control-group">
			<div class="controls">
				<element class="btn-cancel" id="cancel_popup">Cancel</element>
				<button type="reset" class="btn">Reset</button>
				<button type="submit" class="btn btn-success">Create Role</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
