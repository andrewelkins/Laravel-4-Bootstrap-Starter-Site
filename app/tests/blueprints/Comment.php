<?php

use Woodling\Woodling;


Woodling::seed('Comment', array('class' => 'Comment', 'do' => function($blueprint)
{
    $blueprint->created_at = date('Y-m-d H:i:s');
    $blueprint->updated_at = date('Y-m-d H:i:s');
}));

Woodling::seed('CommentOld', array('class' => 'Comment', 'do' => function($blueprint)
{
    $twoWeeksAgo  = mktime(0, 0, 0, date("m")  , date("d")-10, date("Y"));

    $blueprint->created_at = date('Y-m-d H:i:s',$twoWeeksAgo);
    $blueprint->updated_at = date('Y-m-d H:i:s',$twoWeeksAgo);
}));
