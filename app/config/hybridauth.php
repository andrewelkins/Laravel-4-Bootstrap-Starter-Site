<?php

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

	"base_url"   => "http://localhost/ClientWork/xdocker/public/user/login/auth",
	"providers"  => array (
		"Google"     => array (
			"enabled"    => true,
			"keys" => array(
                    "id" => "14213997120-1d5i7v2akm8qrhrkr727mmc14gr4ubkl.apps.googleusercontent.com",
                    "secret" => "x37zYK1JR3HJrMUVCYyG8wOt"
                ),
                ),
		"Facebook"   => array (
			"enabled"    => true,
			"keys"       => array ( "id" => "704422276279320", "secret" => "d26d284bcf5be28487b6fc250599f5f9" ),
           ),
		"LinkedIn"    => array (
			"enabled"    => true,
			"keys"       => array ( "key" => "ID", "secret" => "SECRET" )
			)
	),

);
