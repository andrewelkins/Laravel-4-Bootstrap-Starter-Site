<?php

return array(
 
    'driver' => 'smtp',
 
    'host' => 'smtp.gmail.com',
 
    'port' => 587,
 
    'from' => array('address' => 'test@gamecp.com', 'name' => 'LaravelCP'),
 
    'encryption' => 'tls',
 
    'username' => 'test@gamecp.com',
 
    'password' => 'password',
 
    'sendmail' => '/usr/sbin/sendmail -bs',
 
    'pretend' => false,
 
);

?>