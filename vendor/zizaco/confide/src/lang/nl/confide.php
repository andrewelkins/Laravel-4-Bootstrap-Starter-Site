<?php

/**
 * This is the Dutch translation for Confide. It has a formal and an informal spelling.
 * The formal spelling is used by default. However, by putting the first block in comment (just like this paragraph) and uncommenting the second block, the informal spelling will be used.
 **/

return array(

    'username' => 'Gebruikersnaam',
    'password' => 'Wachtwoord',
    'password_confirmation' => 'Bevestig wachtwoord',
    'e_mail' => 'E-mail',
    'username_e_mail' => 'Gebruikersnaam of e-mail',

    'signup' => array(
        'title' => 'Registratie',
        'desc' => 'Nieuw account aanmaken',
        'confirmation_required' => 'Bevestiging is verplicht',
        'submit' => 'Registreren',
    ),

    'login' => array(
        'title' => 'Inloggen',
        'desc' => 'Vul uw gebruikersnaam en wachtwoord in',
        'forgot_password' => '(wachtwoord vergeten)',
        'remember' => 'Onthouden',
        'submit' => 'Inloggen',
    ),

    'forgot' => array(
        'title' => 'Wachtwoord vergeten',
        'submit' => 'Doorgaan',
    ),

    'alerts' => array(
        'account_created' => 'Uw account is met succes aangemaakt. Controleer uw e-mail voor de instructies voor het activeren van uw account.',
        'too_many_attempts' => 'Teveel pogingen, probeer het nogmaals over enkele minuten.',
        'wrong_credentials' => 'Onjuist e-mailadres, gebruikersnaam of wachtwoord.',
        'not_confirmed' => 'Uw account is nog niet geactiveerd, controleer uw e-mail voor de activatiegegevens.',
        'confirmation' => 'Uw account is geactiveerd! U kunt nu inloggen.',
        'wrong_confirmation' => 'Onjuiste activatie.',
        'password_forgot' => 'De informatie is naar uw e-mail verzonden.',
        'wrong_password_forgot' => 'Gebruiker kon niet gevonden worden.',
        'password_reset' => 'Uw wachtwoord is met succes veranderd.',
        'wrong_password_reset' => 'Onjuist wachtwoord, probeer het nog eens.',
        'wrong_token' => 'De reset token is onjuist.',
        'duplicated_credentials' => 'De ingevulde gegevens zijn al in gebruik.',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'Account activatie',
            'greetings' => 'Beste :name',
            'body' => 'Gebruik onderstaande link om uw account te activeren.',
            'farewell' => 'Met vriendelijke groeten',
        ),

        'password_reset' => array(
            'subject' => 'Wachtwoord reset',
            'greetings' => 'Beste :name',
            'body' => 'Gebruik onderstaande link om uw wachtwoord te veranderen.',
            'farewell' => 'Met vriendelijke groeten',
        ),
    ),

);

/**
 * Uncomment the block below to use the informal spelling.
 **/

/*
return array(

    'username' => 'Gebruikersnaam',
    'password' => 'Wachtwoord',
    'password_confirmation' => 'Bevestig wachtwoord',
    'e_mail' => 'E-mail',
    'username_e_mail' => 'Gebruikersnaam of e-mailadres',

    'signup' => array(
        'title' => 'Registreren',
        'desc' => 'Registreer een nieuw account',
        'confirmation_required' => 'Bevestiging vereist',
        'submit' => 'Maak nieuw account',
    ),

    'login' => array(
        'title' => 'Inloggen',
        'desc' => 'Vul je gegevens in',
        'forgot_password' => '(wachtwoord vergeten)',
        'remember' => 'Onthoud mij',
        'submit' => 'Inloggen',
    ),

    'forgot' => array(
        'title' => 'Wachtwoord vergeten',
        'submit' => 'Doorgaan',
    ),

    'alerts' => array(
        'account_created' => 'Je account is succesvol aangemaakt. Controleer je e-mailinbox voor instructies om je account the bevestigen.',
        'too_many_attempts' => 'Te veel pogingen. Probeer het over een enkele minuten nog eens.',
        'wrong_credentials' => 'Verkeerde gebruikersnaam, e-mailadres of wachtwoord.',
        'not_confirmed' => 'Je account is waarschijnlijk niet bevestigd. Controleer je e-mailinbox voor de bevestigingslink.',
        'confirmation' => 'Je account is bevestigd! Je kunt nu inloggen.',
        'wrong_confirmation' => 'Verkeerde bevestigingscode.',
        'password_forgot' => 'De informatie voor het opnieuw instellen van je wachtwoord is verstuurd naar je e-mailadres.',
        'wrong_password_forgot' => 'Gebruiker niet gevonden.',
        'password_reset' => 'Je wachtwoord is succesvol veranderd.',
        'wrong_password_reset' => 'Verkeerd wachtwoord. Probeer het nog eens.',
        'wrong_token' => 'Het token om je wachtwoord opnieuw in te stellen is niet geldig.',
        'duplicated_credentials' => 'De ingevulde gegevens zijn al in gebruik. Probeer het eens met andere gegevens.',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'Accountbevestiging',
            'greetings' => 'Hallo :name',
            'body' => 'Klik op de onderstaande link om je account te bevestigen.',
            'farewell' => 'Met vriendelijke groet',
        ),

        'password_reset' => array(
            'subject' => 'Wachtwoord opnieuw instellen',
            'greetings' => 'Hallo :name',
            'body' => 'Klik op de onderstaande link om je wachtwoord opnieuw in te stellen.',
            'farewell' => 'Met vriendelijke groet',
        ),
    ),

);
*/
