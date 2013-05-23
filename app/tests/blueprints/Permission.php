<?php

use Woodling\Woodling;


Woodling::seed('manage_posts', array('class' => 'Permission', 'do' => function($blueprint)
{
    $blueprint->id = 1;
    $blueprint->name = 'manage_posts';
    $blueprint->display_name = 'manage posts';
}));
Woodling::seed('manage_pages', array('class' => 'Permission', 'do' => function($blueprint)
{
    $blueprint->id = 2;
    $blueprint->name = 'manage_pages';
    $blueprint->display_name = 'manage pages';
}));
Woodling::seed('manage_users', array('class' => 'Permission', 'do' => function($blueprint)
{
    $blueprint->id = 3;
    $blueprint->name = 'manage_users';
    $blueprint->display_name = 'manage users';
}));
Woodling::seed('post_comment', array('class' => 'Permission', 'do' => function($blueprint)
{
    $blueprint->id = 4;
    $blueprint->name = 'post_comment';
    $blueprint->display_name = 'post_comment';
}));