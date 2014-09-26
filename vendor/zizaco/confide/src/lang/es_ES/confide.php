<?php

return array(

    'username'              => 'Usuario',
    'password'              => 'Contraseña',
    'password_confirmation' => 'Confirmar Contraseña',
    'e_mail'                => 'Email',
    'username_e_mail'       => 'Usuario o Email',

    'signup' => array(
        'title'                 => 'Registro',
        'desc'                  => 'Registrar una nueva cuenta',
        'confirmation_required' => 'Confirmación requerida',
        'submit'                => 'Crear nueva cuenta',
    ),

    'login' => array(
        'title'           => 'Login',
        'desc'            => 'Introduzca sus credenciales',
        'forgot_password' => '(olvidé contraseña)',
        'remember'        => 'Recuerdame',
        'submit'          => 'Login',
    ),

    'forgot' => array(
        'title'  => 'Olvidé contraseña',
        'submit' => 'Continuar',
    ),

    'alerts' => array(
        'account_created'        => 'Su cuenta ha sido creada satisfactoriamente. Por favor, compruebe su e-mail para obtener las instrucciones sobre como confirmar su cuenta.',
        'too_many_attempts'      => 'Demasiados intentos. Inténtelo de nuevo en unos minutos.',
        'wrong_credentials'      => 'Usuario, e-mail o contraseña incorrectos.',
        'not_confirmed'          => 'Su cuenta puede no estar confirmada. Compruebe su e-mail para acceder al enlace de activación.',
        'confirmation'           => '¡Su cuenta ha sido confirmada! Puede acceder ahora.',
        'wrong_confirmation'     => 'Código de confirmación incorrecto.',
        'password_forgot'        => 'La información sobre el reinicio de su contraseña le ha sido enviada por e-mail.',
        'wrong_password_forgot'  => 'Usuario no encontrado.',
        'password_reset'         => 'Su contraseña ha sido cambiada satisfactoriamente.',
        'wrong_password_reset'   => 'Contraseña incorrecta. Inténtelo de nuevo.',
        'wrong_token'            => 'La cadena de reseteo de contraseña no es válida.',
        'duplicated_credentials' => 'Los credenciales introducidos están siendo actualmente usados. Inténtelo con información diferente.',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject'   => 'Confirmación de cuenta',
            'greetings' => 'Hola :name',
            'body'      => 'Por favor acceda al siguiente enlace para confirmar su cuenta.',
            'farewell'  => 'Saludos',
        ),

        'password_reset' => array(
            'subject'   => 'Reestablecer Contraseña',
            'greetings' => 'Hola :name',
            'body'      => 'Acceda al siguiente enlace para cambiar su contraseña',
            'farewell'  => 'Saludos',
        ),
    ),

);
