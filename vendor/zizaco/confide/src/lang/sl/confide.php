<?php

return array(

    'username' => 'Uporabniško ime',
    'password' => 'Geslo',
    'password_confirmation' => 'Potrdite geslo',
    'e_mail' => 'E-poštni naslov',
    'username_e_mail' => 'Uporabniško ime ali e-poštni naslov',

    'signup' => array(
        'title' => 'Registracija',
        'desc' => 'Registrirajte se',
        'confirmation_required' => 'Potrebna potrditev',
        'submit' => 'Ustvarite nov račun',
    ),

    'login' => array(
        'title' => 'Vpis',
        'desc' => 'Vnesite svoje podatke',
        'forgot_password' => '(pozabljeno geslo)',
        'remember' => 'Zapomni si me',
        'submit' => 'Vpis',
    ),

    'forgot' => array(
        'title' => 'Pozabljeno geslo',
        'submit' => 'Nadaljuj',
    ),

    'alerts' => array(
        'account_created' => 'Vaš račun je bil uspešno ustvarjen.',
        'instructions_sent'       => 'Prosimo, da preverite svoj e-poštni predal za navodila o potrditvi računa.',
        'too_many_attempts' => 'Preveč napačnih vnosov. Poskusite spet čez nekaj minut.',
        'wrong_credentials' => 'Napačno uporabniško ime, e-poštni naslov ali geslo.',
        'not_confirmed' => 'Vaš račun še ni potrjen. Preverite e-poštni predal za potrditveno povezavo.',
        'confirmation' => 'Vaš račun je bil potrjen! Lahko se vpišete.',
        'wrong_confirmation' => 'Napačna potrditvena koda.',
        'password_forgot' => 'Podatki o ponastavitvi gesla so bili poslani na vaš e-poštni naslov.',
        'wrong_password_forgot' => 'Uporabnik ne obstaja.',
        'password_reset' => 'Vaše geslo je bilo uspešno spremenjeno.',
        'wrong_password_reset' => 'Napačno geslo. Poskusite znova.',
        'wrong_token' => 'Koda za ponastavitev gesla ni veljavna.',
        'duplicated_credentials' => 'Prijavni podatki, ki ste jih vnesli, že obstajajo.',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'Potrditev računa',
            'greetings' => 'Pozdravljeni, :name',
            'body' => 'Za potrditev računa kliknite na spodnjo povezavo.',
            'farewell' => 'Lep pozdrav',
        ),

        'password_reset' => array(
            'subject' => 'Ponastavitev gesla',
            'greetings' => 'Pozdravljeni, :name',
            'body' => 'Za ponastavitev gesla kliknite na spodnjo povezavo.',
            'farewell' => 'Lep pozdrav',
        ),
    ),

);
