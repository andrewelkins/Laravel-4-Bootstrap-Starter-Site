<form method="POST" action="{{{ (Confide::checkAction('UserController@store')) ?: URL::to('user')  }}}" accept-charset="UTF-8">
    {{ Form::token()  }}
    <fieldset>
        <div class="form-group">
            {{ Form::label('username',Lang::get('user/user.username'),array('id'=>'','class'=>'' )) }}
            {{ Form::text('username','',array('id'=>'username','class'=>'form-control','placeholder'=>Lang::get('user/user.username'))) }}
        </div>
        <div class="form-group">
            {{ Form::label('email',Lang::get('user/user.email'),array('id'=>'','class'=>'' )) }}
            {{ Form::text('email','',array('id'=>'email','class'=>'form-control','placeholder'=>Lang::get('user/user.email'))) }}
        </div>
        <div class="form-group">
            {{ Form::label('password',Lang::get('user/user.password'),array('id'=>'','class'=>'' )) }}
            {{ Form::password('password',array('maxlength'=>25,'id'=>'password','class'=>'form-control','placeholder'=>Lang::get('user/user.password'),'title'=>Lang::get('user/user.password')));  }}
        </div>
        <div class="form-group">
            {{ Form::label('password_confirmation',Lang::get('user/user.password_confirmation'),array('id'=>'','class'=>'' )) }}
            {{ Form::password('password_confirmation',array('maxlength'=>25,'id'=>'password_confirmation','class'=>'form-control','placeholder'=>Lang::get('user/user.password_confirmation'),'title'=>Lang::get('user/user.password_confirmation')));  }}
        </div>

        <h3>{{{ Lang::get('user/user.form_field_meta')  }}}</h3>
        <hr>

        <div class="form-group">
            {{ Form::label('first_name',Lang::get('user/user.first_name'),array('id'=>'','class'=>'' )) }}
            {{ Form::text('first_name','',array('id'=>'first_name','class'=>'form-control','placeholder'=>Lang::get('user/user.first_name'))) }}
        </div>

        <div class="form-group">
            {{ Form::label('last_name',Lang::get('user/user.last_name'),array('id'=>'','class'=>'' )) }}
            {{ Form::text('last_name','',array('id'=>'last_name','class'=>'form-control','placeholder'=>Lang::get('user/user.last_name'))) }}
        </div>

        <div class="form-group">
            {{ Form::label('legal_name',Lang::get('user/user.legal_name'),array('id'=>'','class'=>'' )) }}
            {{ Form::text('legal_name','',array('id'=>'legal_name','class'=>'form-control','placeholder'=>Lang::get('user/user.legal_name'))) }}
        </div>

        <div class="form-group">
            {{ Form::label('id_number',Lang::get('user/user.id_number'),array('id'=>'','class'=>'' )) }}
            {{ Form::text('id_number','',array('id'=>'id_number','class'=>'form-control','placeholder'=>Lang::get('user/user.id_number'))) }}
        </div>

        <div class="form-group">
            {{ Form::label('birthday',Lang::get('user/user.birthday'),array('id'=>'','class'=>'' )) }}
            {{ Form::text('birthday','',array('id'=>'birthday','class'=>'form-control','placeholder'=>Lang::get('user/user.birthday'))) }}
        </div>

        <div class="form-group">
            {{ Form::label('address',Lang::get('user/user.address'),array('id'=>'','class'=>'' )) }}
            {{ Form::text('address','',array('id'=>'address','class'=>'form-control','placeholder'=>Lang::get('user/user.address'))) }}
        </div>

        <div class="form-group">
            {{ Form::label('phone',Lang::get('user/user.phone'),array('id'=>'','class'=>'' )) }}
            {{ Form::text('phone','',array('id'=>'phone','class'=>'form-control','placeholder'=>Lang::get('user/user.phone'))) }}
        </div>

        <div class="form-group">
            {{ Form::captcha()  }}
        </div>
        @if ( Session::get('error') )
            <div class="alert alert-error alert-danger">
                @if ( is_array(Session::get('error')) )
                    {{ head(Session::get('error')) }}
                @endif
            </div>
        @endif

        @if ( Session::get('notice') )
            <div class="alert">{{ Session::get('notice') }}</div>
        @endif

        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
        </div>

    </fieldset>
</form>