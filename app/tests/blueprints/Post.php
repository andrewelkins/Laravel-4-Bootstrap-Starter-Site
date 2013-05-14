<?php

use Woodling\Woodling;


Woodling::seed('Post', array('class' => 'Post', 'do' => function($blueprint)
{
    $blueprint->slug = 'in-iisque-similique-reprimique-eum';
    $blueprint->created_at = date('Y-m-d H:i:s');
    $blueprint->updated_at = date('Y-m-d H:i:s');
}));

Woodling::seed('PostOld', array('class' => 'Post', 'do' => function($blueprint)
{
    $twoWeeksAgo  = mktime(0, 0, 0, date("m")  , date("d")-10, date("Y"));

    $blueprint->slug = 'in-iisque-similique-reprimique-eum';
    $blueprint->created_at = date('Y-m-d H:i:s',$twoWeeksAgo);
    $blueprint->updated_at = date('Y-m-d H:i:s',$twoWeeksAgo);
}));
