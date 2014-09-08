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
                "secret" => "bcSS5IzBG-bRyC-H0M98qx06"
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
                "key" => "ID",
                "secret" => "SECRET"
            )
        )
    ) ,
);
