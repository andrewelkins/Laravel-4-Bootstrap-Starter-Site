@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.login') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="main">
	<div class="page-header">
		<h4 class="text-center">Login into your account</h4>
	</div>
	<p class="text-center">
		<a href="{{URL::to('user/social')}}?provider=Facebook" class="social-facebook "><i class="fa fa-facebook-square fa-4x social-login-icons"></i></a>
		<a href="{{URL::to('user/social')}}?provider=Google" class="social-google "><i class="fa fa-google-plus-square fa-4x"></i></a>
	</p> 
	<p class="text-center">
		<a href="{{URL::to('user/social')}}?provider=LinkedIn" class="social-linkedin "><i class="fa fa-linkedin-square fa-4x social-login-icons"></i></a>
		<a href="{{URL::to('user/social')}}?provider=Git" class="social-git"><i class="fa fa-github-square fa-4x"></i></a>
	</p>
	<form class="form-horizontal" method="POST" action="{{ URL::to('user/login') }}" accept-charset="UTF-8">
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	    <fieldset>
	        <div class="form-group">
	            <label class="control-label" for="email">{{ Lang::get('confide::confide.username_e_mail') }}</label>
	            <input class="form-control" tabindex="1" placeholder="{{ Lang::get('confide::confide.username_e_mail') }}" type="text" name="email" id="email" value="{{ Input::old('email') }}">
	        </div>
	        <div class="form-group">
	        	<a class="pull-right" href="forgot">{{ Lang::get('confide::confide.login.forgot_password') }}</a>
	            <label class="control-label" for="password">
	                {{ Lang::get('confide::confide.password') }} 
	            </label>
	            <input class="form-control" tabindex="2" placeholder="{{ Lang::get('confide::confide.password') }}" type="password" name="password" id="password">
	        </div>
	
	       
	
	        @if ( Session::get('error') )
	        <div class="alert alert-danger">{{ Session::get('error') }}</div>
	        @endif
	
	        @if ( Session::get('notice') )
	        <div class="alert">{{ Session::get('notice') }}</div>
	        @endif
	
	        <div class="form-group">
	            <button tabindex="3" type="submit" class="btn btn-primary">{{ Lang::get('confide::confide.login.submit') }}</button>
	            <div class="checkbox login-checkbox">
				    <label>
				      <input type="hidden" name="remember" value="0">
	                    <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
	                    {{ Lang::get('confide::confide.login.remember') }}
				    </label>
				  </div>
			</div>      
	    </fieldset>
	</form>
</div>

@stop
