<?php
/**
* Class and Function List:
* Function list:
* Classes list:
*/
return array(
    /*
    |--------------------------------------------------------------------------
    | HybridAuth Social network essentials
    |--------------------------------------------------------------------------
    |
    |
    |
    |
    |
    */
    
    "base_url" => URL::to('user/social/auth'),
    "providers" => array(
        "Google" => array(
            "enabled" => true,
            "keys" => array(
                "id" => "1031333276894-29163rbahnkl7mq210ujnj64g2viraoh.apps.googleusercontent.com",
                "secret" => "2ucUzhWErni0PsrCD_HbAA_n"
            ) ,
        ) ,
        "Facebook" => array(
            "enabled" => true,
            "keys" => array(
                "id" => "704422276279320",
                "secret" => "d26d284bcf5be28487b6fc250599f5f9"
            ) ,
        ) ,
        "LinkedIn" => array(
            "enabled" => true,
            "keys" => array(
                "key" => "75e87jrvaewyzk",
                "secret" => "ug1qoqjc3BvdV2q6"
            ) ,
        )
    ) ,
);
