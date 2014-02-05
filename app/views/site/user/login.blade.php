@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.login') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')

<div class="page-header">
	<h1>Login into your account</h1>
</div>
	
<div class="row">

    <div class="container col-md-6">

        <div class="container">
        
        <form class="form-horizontal" method="POST" action="{{ URL::to('user/login') }}" accept-charset="UTF-8">
        
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                <div class="form-group">
                    <label class="control-label" for="email">{{ Lang::get('confide::confide.username_e_mail') }}</label>
                    <div class="">
                        <input class="form-control" tabindex="1" placeholder="{{ Lang::get('confide::confide.username_e_mail') }}" type="text" name="email" id="email" value="{{ Input::old('email') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">
                    {{ Lang::get('confide::confide.password') }}
                </label>
                    <div class="">
                        <input class="form-control" tabindex="2" placeholder="{{ Lang::get('confide::confide.password') }}" type="password" name="password" id="password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 ">
                        <div class="checkbox">
                            <label for="remember">{{ Lang::get('confide::confide.login.remember') }}
                    <input type="hidden" name="remember" value="0">
                    <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                </label>
                        </div>
                    </div>
                </div>

                @if ( Session::get('error') )
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif

                @if ( Session::get('notice') )
                <div class="alert">{{ Session::get('notice') }}</div>
                @endif

                <div class="form-group">
                    <div>
                        <button tabindex="3" type="submit" class="btn btn-primary">{{ Lang::get('confide::confide.login.submit') }}</button>
                        <a class="btn btn-default" href="forgot">{{ Lang::get('confide::confide.login.forgot_password') }}</a>
                    </div>
                </div>
            </fieldset>
        </form>
        </div>
    </div>

    <div class="container col-md-6">
        <div class="jumbotron">
            <h2>Need an Account?</h2>
            <p>Create an account here</p>
            <p>
                <a href="{{ Url::to('user/create') }}" class="btn btn-primary btn-large">
                    Create Account
                </a>
            </p>
        </div>

    </div>

</div><!-- end row -->

@stop
