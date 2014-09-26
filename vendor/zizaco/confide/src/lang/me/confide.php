<?php

return array(

    'username' => 'Korisničko ime',
    'password' => 'Lozinka',
    'password_confirmation' => 'Potvrdi lozinku',
    'e_mail' => 'Email',
    'username_e_mail' => 'Korisničko ime ili Email',

    'signup' => array(
        'title' => 'Novi nalog',
        'desc' => 'Kreirajte novi nalog',
        'confirmation_required' => 'Obavezna je potvrda emaila',
        'submit' => 'Kreiraj novi nalog',
    ),

    'login' => array(
        'title' => 'Prijava',
        'desc' => 'Unesite korisničko ime i lozinku',
        'forgot_password' => '(zaboravljena lozinka?)',
        'remember' => 'Zapamti me',
        'submit' => 'Prijavi me',
    ),

    'forgot' => array(
        'title' => 'Zaboravljena lozinka',
        'submit' => 'Nastavi',
    ),

    'alerts' => array(
        'account_created' => 'Vaš nalog je uspješno kreiran.',
        'instructions_sent'       => 'Molomo Vas da provjerite email za instrukcije kako da potvrdite Vaš nalog.',
        'too_many_attempts' => 'Previše neuspjelih pokušaja. Pokušajte ponovo za par minuta.',
        'wrong_credentials' => 'Pogrešno korisničko ime, email ili lozinka.',
        'not_confirmed' => 'Vaš nalog nije aktivan. Provjerite Vaš email za link za aktivaciju.',
        'confirmation' => 'Vaš nalog je aktiviran! Sada se možete prijaviti.',
        'wrong_confirmation' => 'Pogrešan kod.',
        'password_forgot' => 'Uputstva za poništavanje Vaše lozinke su Vam poslana na email.',
        'wrong_password_forgot' => 'Korisničko ime ne postoji.',
        'password_reset' => 'Vaša lozinka je uspiješno promijenjena.',
        'wrong_password_reset' => 'Netačna lozinka pokušajte ponovo.',
        'wrong_token' => 'Token za poništavanje lozinke nije validan.',
        'duplicated_credentials' => 'Korisničko ime je zauzeto, pokušajte sa nekim drugim.',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'Link za aktivaciju naloga',
            'greetings' => 'Pozdrav :name',
            'body' => 'Kliknite na slijedeći link da aktivirate Vaš nalog.',
            'farewell' => 'Srdačan pozdrav',
        ),

        'password_reset' => array(
            'subject' => 'Resetovanje lozinke',
            'greetings' => 'Pozdrav :name',
            'body' => 'Kliknite na slijedeći link da promijenite Vaš password',
            'farewell' => 'Srdačan pozdrav',
        ),
    ),

);
