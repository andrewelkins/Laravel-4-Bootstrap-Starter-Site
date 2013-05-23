<?php

use Woodling\Woodling;
use Carbon\Carbon;


Woodling::seed('Comment', array('class' => 'Comment', 'do' => function($blueprint)
{
    $blueprint->created_at = Carbon::now();
    $blueprint->updated_at = Carbon::now();
}));

Woodling::seed('CommentOld', array('class' => 'Comment', 'do' => function($blueprint)
{
    $blueprint->created_at = Carbon::now()->subWeeks(2);
    $blueprint->updated_at = Carbon::now()->subWeeks(2);;
}));
