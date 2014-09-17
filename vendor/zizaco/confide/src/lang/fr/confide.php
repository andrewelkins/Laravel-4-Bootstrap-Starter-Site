<?php

return array(

    'username' => 'Utilisateur',
    'password' => 'Mot de passe',
    'password_confirmation' => 'Confirmez le mot de passe',
    'e_mail' => 'Email',
    'username_e_mail' => "Nom d'utilisateur ou Email",

    'signup' => array(
        'title' => "S'enregistrer",
        'desc' => "Créer un nouveau compte",
        'confirmation_required' => 'Confirmation requise',
        'submit' => 'Créer un nouveau compte',
    ),

    'login' => array(
        'title' => 'Connexion',
        'desc' => 'Remplir vos identifiants',
        'forgot_password' => '(mot de passe oublié)',
        'remember' => 'Se souvenir de moi',
        'submit' => 'Se connecter',
    ),

    'forgot' => array(
        'title' => 'Mot de passe oublié',
        'submit' => 'Continuer',
    ),

    'alerts' => array(
        'account_created' => 'Votre compte a été crée avec succes. Veuillez vérifier votre boite email pour les instructions sur la confirmation de votre compte.',
        'too_many_attempts' => 'Trop de tentatives. Veuillez réessayer dans quelques minutes.',
        'wrong_credentials' => 'Utilisateur, email ou mot de passe incorrect.',
        'not_confirmed' => "Votre compte n'est pas confirmé. Veuillez vérifier vos emails pour le lien de confirmation.",
        'confirmation' => "Votre compte a été confirmé avec succes. Vous pouvez désormais vous connecter.",
        'wrong_confirmation' => 'Code de confirmation incorrect',
        'password_forgot' => 'Les informations de réinitialisation vous ont été envoyé par email.',
        'wrong_password_forgot' => 'Utilisateur inconnu.',
        'password_reset' => 'Votre mot de passe a été modifié avec succes.',
        'wrong_password_reset' => 'Mot de passe incorrect. Veuillez réessayer',
        'wrong_token' => 'Le token de réinitialisation du mot de passe est incorrect.',
        'duplicated_credentials' => "Les identifiants donnés sont déja utilisés. Veuillez réessayer avec d'autres identifiants.",
    ),

    'email' => array(
        'account_confirmation' => array(
            'subject' => 'Confirmation du compte',
            'greetings' => 'Bonjour :name',
            'body' => 'Veuillez cliquer sur le lien ci-dessous pour confirmer votre compte.',
            'farewell' => 'Bien à vous.',
        ),

        'password_reset' => array(
            'subject' => 'Réinitialisation du mot de passe',
            'greetings' => 'Bonjour :name',
            'body' => 'Veuillez cliquer sur le lien ci-dessous pour réinitialiser votre mot de passe.',
            'farewell' => 'Bien à vous.',
        ),
    ),

);
