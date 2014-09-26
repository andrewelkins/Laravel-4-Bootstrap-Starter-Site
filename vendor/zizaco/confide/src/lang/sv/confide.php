<?php

return array(

    'username' => 'Användarnamn',
    'password' => 'Lösenord',
    'password_confirmation' => 'Bekräfta lösenord',
    'e_mail' => 'E-post',
    'username_e_mail' => 'Användarnamn eller e-post',

    'signup' => array(
        'title' => 'Bli medlem',
        'desc' => 'Skapa ett konto genom att bli medlem',
        'confirmation_required' => 'Bekräftelse krävs',
        'submit' => 'Skapa nytt konto',
    ),

    'login' => array(
        'title' => 'Inloggning',
        'desc' => 'Fyll i dina uppgifter',
        'forgot_password' => '(glömt lösenord)',
        'remember' => 'Kom ihåg mig',
        'submit' => 'Logga in',
    ),

    'forgot' => array(
        'title' => 'Glömt lösenord',
        'submit' => 'Fortsätt',
    ),

    'alerts' => array(
        'account_created' => 'Ditt konto är skapat.',
        'instructions_sent'       => 'Please check your email for the instructions on how to confirm your account.',
        'instructions_sent'       => 'Please check your email for the instructions on how to confirm your account.',
        'too_many_attempts' => 'För många försök. Försök igen om några minuter.',
        'wrong_credentials' => 'Användarnamn, e-postadress eller lösenord är ogiltigt.',
        'not_confirmed' => 'Ditt konto verkar inte vara bekräftat. Kontrollera din e-post för att hitta bekräftelselänken.',
        'confirmation' => 'Ditt konto är bekräftat! Du kan logga in nu.',
        'wrong_confirmation' => 'Felaktig bekräftelsekod.',
        'password_forgot' => 'Information för att återställa ditt lösenord är skickat till din e-postadress.',
        'wrong_password_forgot' => 'Användare hittades inte.',
        'password_reset' => 'Ditt lösenord är ändrat.',
        'wrong_password_reset' => 'Ogiltigt lösenord. Försök igen',
        'wrong_token' => 'Symbolen för lösenordsåterställning är felaktig.',
        'duplicated_credentials' => 'De angivna uppgifterna används redan. Prova med andra uppgifter.',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'Kontobekräftelse',
            'greetings' => 'Hej :name',
            'body' => 'Vänligen använd länken nedan för att bekräfta ditt konto.',
            'farewell' => 'Hälsningar',
        ),

        'password_reset' => array(
            'subject' => 'Lösenordsåterställning',
            'greetings' => 'Hej :name',
            'body' => 'Vänligen använd länken nedan för att ersätta ditt lösenord.',
            'farewell' => 'Hälsningar',
        ),
    ),

);
