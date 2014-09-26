<?php

return array(

    'username' => 'Vartotojo vardas',
    'password' => 'Slaptažodis',
    'password_confirmation' => 'Pakartokite slaptažodį',
    'e_mail' => 'El. pašto adresas',
    'username_e_mail' => 'Vartotojo vardas arba el. paštas',

    'signup' => array(
        'title' => 'Registracija',
        'desc' => 'Užsiregistruokite savo vartotojo paskyrą',
        'confirmation_required' => 'Reikalingas patvirtinimas',
        'submit' => 'Registruotis',
    ),

    'login' => array(
        'title' => 'Prisijungti',
        'desc' => 'Įveskite duomenis',
        'forgot_password' => '(pamiršau slaptažodį)',
        'remember' => 'Prisiminti mane',
        'submit' => 'Prisijungti',
    ),

    'forgot' => array(
        'title' => 'Pamiršau slaptažodį',
        'submit' => 'Patvirtinti',
    ),

    'alerts' => array(
        'account_created' => 'Jūsų vartotojo paskyra sėkmingai sukurta.',
        'instructions_sent' => 'Prašome pasitikrinti el. pašte instrukcijas kaip aktyvuoti savo paskyrą.',
        'too_many_attempts' => 'Pasiektas bandymų limitas. Bandykite dar po kelių minučių.',
        'wrong_credentials' => 'Neteisingas vartotojo vardas, el. paštas arba slaptažodis.',
        'not_confirmed' => 'Jūsų paskyra yra nepatvirtinta. Pasitikrinkite el. paštą ir aktyvuokite paspaudus ant atsiųstos aktyvavimo nuorodos.',
        'confirmation' => 'Jūsų paskyra buvo patvirtinta! Galite prisijungti.',
        'wrong_confirmation' => 'Neteisingas patvirtinimo kodas.',
        'password_forgot' => 'Informacija kaip pasikeisti slaptažodį buvo išsiųsta jūsų el. pašto adresu.',
        'wrong_password_forgot' => 'Vartotojas nerastas.',
        'password_reset' => 'Jūsų slaptažodis sėkmingai pakeistas.',
        'wrong_password_reset' => 'Slaptažodis neteisingas, bandykite dar kartą.',
        'wrong_token' => 'Slaptažodžio keitimo kodas yra neteisingas.',
        'duplicated_credentials' => 'Nurodyti duomenys jau yra naudojami. Prašome įvesti kitus.',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'Vartotojo paskyros patvirtinimas',
            'greetings' => 'Sveiki, :name',
            'body' => 'Paspauskite ant nuorodos žemiau, kad aktyvuotumėte savo paskyrą.',
            'farewell' => 'Geriausi linkėjimai.',
        ),

        'password_reset' => array(
            'subject' => 'Slaptažodžio keitimas',
            'greetings' => 'Sveiki, :name',
            'body' => 'Paspauskite ant nuorodos žemiau, kad galėtumėte pasikeisti savo slaptažodį.',
            'farewell' => 'Geriausi linkėjimai.',
        ),
    ),

);
