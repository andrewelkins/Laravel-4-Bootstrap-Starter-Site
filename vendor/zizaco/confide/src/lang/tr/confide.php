<?php

return array(

    'username' => 'Kullanıcı adı',
    'password' => 'Parola',
    'password_confirmation' => 'Parolayı Doğrula',
    'e_mail' => 'E-posta',
    'username_e_mail' => 'Kullanıcı adı veya E-posta',

    'signup' => array(
        'title' => 'Kaydol',
        'desc' => 'Yeni bir hesap için kaydol',
        'confirmation_required' => 'Doğrulama gerekiyor',
        'submit' => 'Yeni bir hesap aç',
    ),

    'login' => array(
        'title' => 'Giriş yap',
        'desc' => 'Üyelik bilgilerinizi yazın',
        'forgot_password' => '(parolamı unuttum)',
        'remember' => 'Beni hatırla',
        'submit' => 'Giriş yap',
    ),

    'forgot' => array(
        'title' => 'Parolamı unuttum',
        'submit' => 'Devam',
    ),

    'alerts' => array(
        'account_created' => 'Hesabınız başarıyla oluşturuldu. Hesabınızı doğrulamak için gereken adımları görmek için lütfen size gönderilen e-postayı kontrol edin.',
        'too_many_attempts' => 'Çok fazla deneme yapıldı. Birkaç dakika sonra tekrar deneyiniz.',
        'wrong_credentials' => 'Geçersiz kullanıcı adı, e-posta adresi veya parola.',
        'not_confirmed' => 'Hesabınız doğrulanmamış olabilir. Doğrulama bağlantısı için lütfen size gönderilen e-postayı kontrol edin.',
        'confirmation' => 'Hesabınız doğrulandı! Şimdi giriş yapabilirsiniz.',
        'wrong_confirmation' => 'Hatalı doğrulama kodu.',
        'password_forgot' => 'Parolanızı sıfırlamak için size bir e-posta gönderildi.',
        'wrong_password_forgot' => 'Kullanıcı bulunamadı.',
        'password_reset' => 'Parolanız başarıyla değiştirildi.',
        'wrong_password_reset' => 'Hatalı parola. Lütfen tekrar deneyin.',
        'wrong_token' => 'Kullandığınız parola sıfırlama bağlantısı geçersiz.',
        'duplicated_credentials' => 'Bu bilgiler daha önce kullanılmıştır. Lütfen farklı bilgiler ile tekrar deneyiniz.',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'Hesap Doğrulama',
            'greetings' => 'Merhaba :name',
            'body' => 'Lütfen hesabınızı doğrulamak için aşağıdaki bağlantıyı kullanınız.',
            'farewell' => 'Saygılarımızla',
        ),

        'password_reset' => array(
            'subject' => 'Parola sıfırlama',
            'greetings' => 'Merhaba :name',
            'body' => 'Aşağıdaki bağlantıyı kullanarak parolanızı değiştirin',
            'farewell' => 'Saygılarımızla',
        ),
    ),

);
