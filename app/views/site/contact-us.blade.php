@extends('site.layouts.default')
{{-- Web site Title --}}
@section('title')
{{{ Lang::get('site.contact_us') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')

{{{ Lang::get('site.contact_us') }}}

@stop
