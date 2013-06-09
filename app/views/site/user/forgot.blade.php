@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.forgot_password') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
    <h1>{{{ Lang::get('user/user.forgot_password') }}}</h1>
</div>
<form method="POST" action="{{ (Confide::checkAction('UserController@do_forgot_password')) ?: URL::to('/user/forgot') }}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

    <label for="email">{{{ Lang::get('confide::confide.e_mail') }}}</label>
    <input placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">

    @if( Config::get('config.use_recaptcha') )
        {{ Form::captcha() }}
    @endif

    @if ( Session::get('error') )
        <div class="alert alert-error">
            @if ( is_array(Session::get('error')) )
                {{ head(Session::get('error')) }}
            @else
                {{{ Session::get('error') }}}
            @endif
        </div>
    @endif

    @if ( Session::get('notice') )
        <div class="alert">{{{ Session::get('notice') }}}</div>
    @endif

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.forgot.submit') }}}</button>
    </div>
</form>
@stop
