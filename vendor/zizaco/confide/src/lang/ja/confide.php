<?php

return array(

    'username' => 'ユーザー名',
    'password' => 'パスワード',
    'password_confirmation' => 'パスワードの確認',
    'e_mail' => 'メールアドレス',
    'username_e_mail' => 'ユーザー名 もしくは メールアドレス',

    'signup' => array(
        'title' => 'アカウント作成',
        'desc' => '新しいアカウントの作成',
        'confirmation_required' => '確認が必要です',
        'submit' => '新規アカウント作成',
    ),

    'login' => array(
        'title' => 'ログイン',
        'desc' => 'ログイン情報を入力してください',
        'forgot_password' => '(パスワードを忘れた)',
        'remember' => 'ログイン状態を保持する',
        'submit' => 'ログイン',
    ),

    'forgot' => array(
        'title' => 'パスワードを忘れた',
        'submit' => '次へ',
    ),

    'alerts' => array(
        'account_created' => 'あなたのアカウントは正常に作成されました。 アカウントの確認方法についてはご登録のメールを参照してください。',
        'too_many_attempts' => 'ログイン試行回数が多すぎます。 しばらくしてから再実行してください。',
        'wrong_credentials' => 'ユーザー名、メールアドレスあるいはパスワードが間違っています。',
        'not_confirmed' => 'あなたのアカウントは確認されていません。メールに記載されている確認用のリンクへアクセスしてください',
        'confirmation' => 'あなたのアカウントが確認されました！ いますぐログインできます。',
        'wrong_confirmation' => '確認コードが間違っています。',
        'password_forgot' => 'ご登録のメールアドレス宛にパスワード初期化についての情報をお送りいたしました。',
        'wrong_password_forgot' => 'ユーザーが存在しません。',
        'password_reset' => 'パスワードを正常に変更しました。',
        'wrong_password_reset' => 'パスワードが間違っています。 もう一度入力してください',
        'wrong_token' => 'パスワード初期化用のトークンが間違っています。',
        'duplicated_credentials' => 'ご入力いただいた認証情報はすでに使用されています。別のものをご入力ください。',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'アカウント確認',
            'greetings' => 'こんにちは :name さん',
            'body' => 'あなたのアカウントを確認するために以下のリンクへアクセスしてください。',
            'farewell' => 'よろしくお願いいたします。',
        ),

        'password_reset' => array(
            'subject' => 'パスワード初期化',
            'greetings' => 'こんにちは :name さん',
            'body' => 'あなたのパスワードを初期化するために以下のリンクへアクセスしてください。',
            'farewell' => 'よろしくお願いいたします。',
        ),
    ),

);
