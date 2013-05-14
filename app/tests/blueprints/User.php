<?php

use Woodling\Woodling;
use J20\Uuid;

Woodling::seed('UserAdmin', array('class' => 'User', 'do' => function($blueprint)
{
    $blueprint->username = 'admin';
    $blueprint->email = 'admin@example.org';
    $blueprint->confirmation_code = Uuid\Uuid::v4(false);
    $blueprint->confirmed = 1;
    $blueprint->created = date('Y-m-d H:i:s');
    $blueprint->updated = function() use($blueprint)
    {
        return date('Y-m-d H:i:s', strtotime("{$blueprint->created} + 2 months"));
    };
}));

Woodling::seed('UserUser', array('class' => 'User', 'do' => function($blueprint)
{
    $blueprint->username = 'user';
    $blueprint->email = 'user@example.org';
    $blueprint->confirmation_code = Uuid\Uuid::v4(false);
    $blueprint->confirmed = 1;
    $blueprint->created = date('Y-m-d H:i:s');
    $blueprint->updated = function() use($blueprint)
    {
        return date('Y-m-d H:i:s', strtotime("{$blueprint->created} + 2 months"));
    };
}));
