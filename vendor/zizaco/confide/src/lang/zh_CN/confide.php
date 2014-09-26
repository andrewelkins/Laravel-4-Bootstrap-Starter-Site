<?php

return array(

    'username' => '用户名',
    'password' => '密码',
    'password_confirmation' => '确认密码',
    'e_mail' => '电子邮件',
    'username_e_mail' => '用户名或者电子邮件',

    'signup' => array(
        'title' => '注册',
        'desc' => '注册新用户',
        'confirmation_required' => '需要验证',
        'submit' => '创建新账户',
    ),

    'login' => array(
        'title' => '登录',
        'desc' => '输入您的凭证',
        'forgot_password' => '(忘记密码)',
        'remember' => '记住登录状态啊',
        'submit' => '登录',
    ),

    'forgot' => array(
        'title' => '忘记密码',
        'submit' => '下一步',
    ),

    'alerts' => array(
        'account_created' => '注册成功。请查阅您的电子邮箱，根据说明进行账户验证。',
        'too_many_attempts' => '尝试次数过多，请稍后再试。',
        'wrong_credentials' => '用户名、电子邮箱或者密码错误。',
        'not_confirmed' => '您的账户尚未验证，请查阅您的电子邮箱。',
        'confirmation' => '您的账户已验证！您现在可以登录了。',
        'wrong_confirmation' => '验证码错误！',
        'password_forgot' => '关于密码重置的信息已经发送到您的电子邮件',
        'wrong_password_forgot' => '用户不存在。',
        'password_reset' => '您的密码已经成功修改。',
        'wrong_password_reset' => '密码无效，请重试。',
        'wrong_token' => '密码重设令牌无效',
        'duplicated_credentials' => '您提供的凭据已被使用。请尝试其他凭据。',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => '账户验证',
            'greetings' => '你好， :name',
            'body' => '请通过下方的超链接来验证您的账户。',
            'farewell' => '顺祝商祺',
        ),

        'password_reset' => array(
            'subject' => '重设密码',
            'greetings' => '你好， :name',
            'body' => '请通过下方的超链接来修改您的密码。',
            'farewell' => '顺祝商祺',
        ),
    ),

);
