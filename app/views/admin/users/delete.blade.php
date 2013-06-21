@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')

    <!-- Tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
    </ul>
    <!-- ./ tabs -->

    {{-- Delete User Form --}}
    {{ Form::model($user, array('route' => array('admin.users.destroy', $user->id) , 'method' => 'delete', 'class' => 'form-horizontal')) }}

        {{ Form::hidden('id', $user->id) }}

        <!-- Form Actions -->
        <div class="control-group">
            <div class="controls">
                <element class="btn-cancel close_popup">Cancel</element>
                <button type="submit" class="btn btn-danger close_popup">Delete</button>
            </div>
        </div>
        <!-- ./ form actions -->

    {{ Form::close() }}
@stop