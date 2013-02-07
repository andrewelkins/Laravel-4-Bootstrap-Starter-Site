Hello {{ $user->first_name }},

<br /><br />

, please click <a href="{{ URL::to('account/forgot-password/' . $user->id . '/' . $user->getResetPasswordCode()) }}">here</a> to reset your password.

<br /><br />

Regards,<br />
Foo Bar Company
