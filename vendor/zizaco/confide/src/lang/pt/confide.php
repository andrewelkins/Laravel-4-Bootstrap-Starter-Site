<?php

return array(

    'username' => 'Nome de Usuário',
    'password' => 'Senha',
    'password_confirmation' => 'Confirmar senha',
    'e_mail' => 'Email',
    'username_e_mail' => 'Email ou Usuário',

    'signup' => array(
        'title' => 'Cadastrar',
        'desc' => 'Cadastrar nova conta',
        'confirmation_required' => 'Confirmação necessária',
        'submit' => 'Criar nova conta',
    ),

    'login' => array(
        'title' => 'Entrar',
        'desc' => 'Entre suas credenciais',
        'forgot_password' => '(esqueci minha senha)',
        'remember' => 'Continuar conectado',
        'submit' => 'Entrar',
    ),

    'forgot' => array(
        'title' => 'Esqueci minha senha',
        'submit' => 'Continuar',
    ),

    'alerts' => array(
        'account_created' => 'Sua conta foi criada com sucesso! Por favor verifique em seu e-mail as instruções para confirmar a sua conta.',
        'wrong_credentials' => 'Nome de usuário ou senha incorretos.',
        'too_many_attempts' => 'Muitas tentativas incorretas. Tente novamente mais tarde.',
        'not_confirmed' => 'Sua conta pode não estar confirmada. Verifique seu email e procure pelo link de confirmação',
        'confirmation' => 'Sua conta foi confirmada! Você pode entrar agora.',
        'wrong_confirmation' => 'Código de confirmação incorreto.',
        'password_forgot' => 'As informações para a troca de senha foram enviadas ao seu e-mail.',
        'wrong_password_forgot' => 'Usuário não encontrado.',
        'password_reset' => 'Sua senha foi alterada com sucesso.',
        'wrong_password_reset' => 'Senha inválida. Tente novamente.',
        'duplicated_credentials' => 'As credenciais fornecidos já foram usadas. Tente com credenciais diferentes.',
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'Confirmação de conta',
            'greetings' => 'Olá :name',
            'body' => 'Por favor, acesse o link abaixo para confirmar a sua conta',
            'farewell' => 'Att',
        ),

        'password_reset' => array(
            'subject' => 'Troca de senha',
            'greetings' => 'Olá :name',
            'body' => 'Acesse o link a seguir para trocar a sua senha',
            'farewell' => 'Att',
        ),
    ),

);
