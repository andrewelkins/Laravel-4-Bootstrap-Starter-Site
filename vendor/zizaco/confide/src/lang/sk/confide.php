<?php

return array(

  'username'                  => 'Užívateľské meno',
  'password'                  => 'Heslo',
  'password_confirmation'     => 'Potvrdiť heslo',
  'e_mail'                    => 'Email',
  'username_e_mail'           => 'Užívateľské meno alebo Email',

  'signup'  => array(
    'title'                   => 'Registrovať',
    'desc'                    => 'Vytvoriť nový účet',
    'confirmation_required'   => 'Vyžaduje sa aktivácia účtu emailom',
    'submit'                  => 'Registrovať',
  ),

  'login'   => array(
    'title'                   => 'Prihlásiť sa',
    'desc'                    => 'Zadajte svoje prihlasovacie údaje',
    'forgot_password'         => '(zabudol som heslo)',
    'remember'                => 'Zapamätať prihlásenie',
    'submit'                  => 'Prihlásiť',
  ),

  'forgot'  => array(
    'title'                   => 'Zabudnuté heslo',
    'submit'                  => 'Pokračovať',
  ),

  'alerts'  => array(
    'account_created'         => 'Váš účet bol úspešne vytvorený.',
    'instructions_sent'       => 'Na email vám boli zaslané inštrukcie na aktiváciu účtu.',
    'too_many_attempts'       => 'Prekročili ste limit pokusov o registráciu. Skúste to opäť o niekoľko minút.',
    'wrong_credentials'       => 'Nesprávne užívateľské meno, email alebo heslo.',
    'not_confirmed'           => 'Váš účet nie je aktivovaný. Inštrukcie na aktiváciu vám boli zaslané na email.',
    'confirmation'            => 'Váš účet bol aktivovaný. Teraz sa môžete prihlásiť.',
    'wrong_confirmation'      => 'Nesprávny aktivačný kód.',
    'password_forgot'         => 'Inštrukcie pre obnovenie hesla boli odoslané na váš email.',
    'wrong_password_forgot'   => 'Užívateľ nebol nájdený.',
    'password_reset'          => 'Vaše heslo bolo úspešne zmenené.',
    'wrong_password_reset'    => 'Nesprávne heslo.',
    'wrong_token'             => 'Token potrebný pre obnovenie hesla nie je správny.',
    'duplicated_credentials'  => 'Poskytnuté údaje sa už používajú. Skúste to opäť s inými údajmi.',
  ),

  'email'   => array(
    'account_confirmation'  => array(
      'subject'               => 'Aktivácia účtu',
      'greetings'             => 'Dobrý deň :name,',
      'body'                  => 'Pre aktiváciu účtu, kliknite na nasledujúci odkaz.',
      'farewell'              => 'Prajeme pekný deň',
    ),

    'password_reset'        => array(
      'subject'               => 'Obnovenie hesla',
      'greetings'             => 'Dobrý deň :name,',
      'body'                  => 'Pre obnovenie hesla, kliknite na nasledujúci odkaz.',
      'farewell'              => 'Prajeme pekný deň',
    ),
  ),

);
