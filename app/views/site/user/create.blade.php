@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h4>Signup</h4>
</div>
<div class="row">
	<div class="col-md-6">
		{{ Confide::makeSignupForm()->render() }}
	</div>
	<div class="col-md-6">
		@include('site.user.social');
	</div>
</div>
@stop
