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
	<div class="col-md-8">
		{{ Confide::makeSignupForm()->render() }}
	</div>
	<div class="col-md-4">
		<legend class="text-center">{{{ Lang::get('user/user.signup_social') }}}</legend>
		@include('site.user.social')
	</div>
</div>
@stop
