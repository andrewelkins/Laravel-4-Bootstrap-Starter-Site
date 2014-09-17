<?php

return array(

    'username' => 'Nom d\'usuari',
    'password' => 'Contrasenya',
    'password_confirmation' => 'Confirmació de la contrasenya',
    'e_mail' => 'Email',
    'username_e_mail' => 'Nom d\'usuari o email',

    'signup' => array(
        'title' => 'Registra\'t',
        'desc' => 'Registra un nou compte',
        'confirmation_required' => 'Confirmació requerida',
        'submit' => 'Crea un nou compte',
    ),

    'login' => array(
        'title' => 'Autenticat',
        'desc' => 'Introdueix les teves credencials',
        'forgot_password' => '(Contrasenya oblidada)',
        'remember' => 'Recorda\'m',
        'submit' => 'Autentica\'t',
    ),

    'forgot' => array(
        'title' => 'Contrasenya oblidada',
        'submit' => 'Continuar',
    ),

    'alerts' => array(
        'account_created' => 'El teu compte s\'ha creat correctament. Sisplau revisa el teu e-mail per les instruccións on com confirmar el teu compte.',
        'too_many_attempts' => 'Massa intents. Prova de nou en uns minuts.',
        'wrong_credentials' => 'Nom d\'usuari, email o contrasenya incorrecte.',
        'not confirmed' => 'El teu compte no esta confirmat. Comprova el teu email per un link de confirmació.',
        'confirmation' => 'El teu compte ha sigut confirmat! Ara et pots autenticar.',
        'wrong_confirmation' => 'Codi de confirmació erroni.',
        'password_forgot' => 'La informació en relació al canvi de la teva contrasenya ha sigut enviada al teu email.',
        'wrong_password_forgot' => 'No s\'ha trobat l\'usuari.',
        'password_reset' => 'La teva contrasenya s\'ha cambiat satisfactoriament.',
        'wrong_password_reset' => 'Contrasenya incorrecta. Prova un altre cop.',
        'duplicated_credentials' => 'Les credencials proporcionades ja han estat utilitzats. Proveu amb diferents credencials.',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'Confirmació de compte',
            'greetings' => 'Benvingut :name',
            'body' => 'Sisplau accedeix al següent link per a confirmar el teu compte.',
            'farewell' => 'Atentament',
        ),

        'password_reset' => array(
            'subject' => 'Reconfiguració de la contrasenya',
            'greetings' => 'Benvingut :name',
            'body' => 'Accedeix al següent link per a canviar al teva contrasenya.',
            'farewell' => 'Atentament',
        ),
    ),

);
