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
    @include('site.user.social')
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
                <div class="checkbox login-checkbox">
                    <label>
                      <input type="hidden" name="remember" value="0">
                        <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                        {{ Lang::get('confide::confide.login.remember') }}
                    </label>
                </div>
                <button tabindex="3" type="submit" class="btn btn-success">{{ Lang::get('confide::confide.login.submit') }}</button>
            </div>      
        </fieldset>
    </form>
</div>

@stop
