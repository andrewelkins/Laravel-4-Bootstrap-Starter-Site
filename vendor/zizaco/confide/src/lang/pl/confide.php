<?php

return array(

    'username' => 'Nazwa użytkownika',
    'password' => 'Hasło',
    'password_confirmation' => 'Potwierdź hasło',
    'e_mail' => 'Email',
    'username_e_mail' => 'Nazwa użytkownika lub Email',

    'signup' => array(
        'title' => 'Rejestracja',
        'desc' => 'Rejestracja nowego konta',
        'confirmation_required' => 'Wymagane potwierdzenie adresu email',
        'submit' => 'Utwórz nowe konto',
    ),

    'login' => array(
        'title' => 'Logowanie',
        'desc' => 'Wprowadź swoje dane',
        'forgot_password' => '(Zapomniałem hasła)',
        'remember' => 'Zapamiętaj mnie',
        'submit' => 'Zaloguj',
    ),

    'forgot' => array(
        'title' => 'Zapomniałem hasła',
        'submit' => 'Dalej',
    ),

    'alerts' => array(
        'account_created' => 'Twoje konto zostało utworzone. Sprawdź skrzynkę pocztową i podążąj za dalszymi instrukcjami aby potwierdzić swój adress email.',
        'too_many_attempts' => 'Zbyt dużo prób logowania. Spróbuj ponownie za kilka minut.',
        'wrong_credentials' => 'Niepoprawna nazwa użytkownika, email lub hasło.',
        'not_confirmed' => 'Twoje konto nie jest potwierdzone. Sprawdź skrzynkę pocztową i kliknij w link potwierdzający.',
        'confirmation' => 'Twoje konto zostało potwierdzone! Teraz możesz się zalogować.',
        'wrong_confirmation' => 'Niepoprawny kod potwierdzający.',
        'password_forgot' => 'Informacja o zmianie hasła została wysłana na twój adres email.',
        'wrong_password_forgot' => 'Użytkownik nie istnieje.',
        'password_reset' => 'Twoje hasło zostało zmienione.',
        'wrong_password_reset' => 'Niepoprawne hasło. Spróbuj ponownie.',
        'wrong_token' => 'Token resetowania hasła jest niepoprawny.',
        'duplicated_credentials' => 'Nazwa użytkownika lub adres email jest już zajęty. Spróbuj podając inne dane.',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'Potwiedzenie konta',
            'greetings' => 'Witaj :name,',
            'body' => 'Proszę kliknij w poniższy link, aby potwierdzić swoje konto.',
            'farewell' => 'Z pozdrowieniami,',
        ),

        'password_reset' => array(
            'subject' => 'Zmiana hasła',
            'greetings' => 'Witaj :name,',
            'body' => 'Aby go aktywować nowe hasło, kliknij w poniższy link:',
            'farewell' => 'Z pozdrowieniami,',
        ),
    ),

);
