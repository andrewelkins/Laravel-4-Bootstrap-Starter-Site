<?php

use Woodling\Woodling;


Woodling::seed('RoleAdmin', array('class' => 'Role', 'do' => function($blueprint)
{
    $blueprint->id = 1;
    $blueprint->name = 'admin';
    $blueprint->permissions = array('manage_posts','manage_pages','manage_users','post_comment');
}));

Woodling::seed('RoleComment', array('class' => 'Role', 'do' => function($blueprint)
{
    $blueprint->id = 1;
    $blueprint->name = 'comment';
    $blueprint->permissions = array('post_comment');
}));