<?php

return array(

    'username' => 'Benutzername',
    'password' => 'Passwort',
    'password_confirmation' => 'Passwort bestätigen',
    'e_mail' => 'E-Mail',
    'username_e_mail' => 'Benutzername oder E-Mail',

    'signup' => array(
        'title' => 'Registrierung',
        'desc' => 'Registrierung eines neuen Kontos',
        'confirmation_required' => 'Bestätigung erforderlich',
        'submit' => 'Registrieren',
    ),

    'login' => array(
        'title' => 'Anmelden',
        'desc' => 'Geben Sie Ihre Anmeldeinformationen ein',
        'forgot_password' => '(Passwort vergessen)',
        'remember' => 'Angemeldet bleiben',
        'submit' => 'Anmelden',
    ),

    'forgot' => array(
        'title' => 'Passwort vergessen',
        'submit' => 'Weiter',
    ),

    'alerts' => array(
        'account_created' => 'Ihr Konto wurde erfolgreich angelegt. Bitte prüfen Sie Ihre E-Mails um Ihr Konto zu bestätigen.',
        'too_many_attempts' => 'Zu viele Versuche. Probieren Sie es in ein paar Minuten erneut.',
        'wrong_credentials' => 'Falscher Benutzername, E-Mail oder Passwort.',
        'not_confirmed' => 'Ihr Konto wurde möglicherweise nicht bestätigt. Prüfen Sie Ihre E-Mails um Ihr Konto zu bestätigen.',
        'confirmation' => 'Ihr Konto wurde bestätigt. Sie können sich nun anmelden.',
        'wrong_confirmation' => 'Falscher Bestätigungscode.',
        'password_forgot' => 'Die Informationen zum Zurücksetzen des Passworts wurden Ihnen per E-Mail gesendet.',
        'wrong_password_forgot' => 'Benutzer nicht gefunden.',
        'password_reset' => 'Ihr Passwort wurde erfolgreich geändert.',
        'wrong_password_reset' => 'Falsches Passwort. Erneut versuchen.',
        'wrong_token' => 'Der Token zum Zurücksetzen des Passworts ist nicht valide.',
        'duplicated_credentials' => 'Ihre gewählten Kontoinformationen werden schon verwendet. Bitte versuchen Sie es mit anderen.',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'Kontobestätigung',
            'greetings' => 'Hallo :name',
            'body' => 'Bitte folgen Sie dem unten stehenden Link um Ihr Konto zu bestätigen.',
            'farewell' => 'Vielen Dank',
        ),

        'password_reset' => array(
            'subject' => 'Passwort zurücksetzen',
            'greetings' => 'Hallo :name',
            'body' => 'Bitte folgen Sie dem unten stehenden Link um Ihr Passwort zu ändern  .',
            'farewell' => 'Vielen Dank',
        ),
    ),

);
