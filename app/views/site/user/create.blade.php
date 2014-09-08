@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.register') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>Signup</h1>
</div>
{{ Confide::makeSignupForm()->render() }}
<div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <a href="{{URL::to('user/social')}}?provider=Facebook"><span class="fui-fb"></span></a>
		        <a href="{{URL::to('user/social')}}?provider=Google"><span class="fui-facebook"></span></a> 
		        <a href="{{URL::to('user/social')}}?provider=LinkedIn"><span class="fui-arrow-right"></span>
            </div>
        </div> 
@stop
