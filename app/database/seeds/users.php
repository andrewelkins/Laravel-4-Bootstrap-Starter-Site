<?php

$dt = new DateTime('now');
$now = $dt->format('Y-m-d H:i:s');

return array(
    'username'      => 'test',
    'email'      => 'test@test.com',
    'password'   => Hash::make('test'),
    'confirmed'   => 0,
    'created_at' => $now,
    'updated_at' => $now
);