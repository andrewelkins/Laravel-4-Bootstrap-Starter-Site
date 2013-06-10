<?php

return array(

	/*
    |--------------------------------------------------------------------------
    | Collections
    |--------------------------------------------------------------------------
    |
    | Basset is built around collections. A collection contains assets for
    | your application. Collections can contain both stylesheets and
    | javascripts.
    |
    | A default "application" collection is ready for immediate use. It makes
    | a couple of assumptions about your directory structure.
    |
    | /public
    |    /assets
    |        /stylesheets
    |            /less
    |            /sass
    |        /javascripts
    |            /coffeescripts
    |
    | You can overwrite this collection or remove it by publishing the config.
    |
    */

    'public-css' => function($collection)
    {
        $collection->directory('assets/css', function($collection)
        {
            $collection->add('bootstrap.min.css');
            $collection->add('bootstrap-responsive.min.css');
            $collection->add('style.css');
        })->apply('UriRewriteFilter');
    },
    'public-js' => function($collection)
    {
        $collection->directory('assets/js', function($collection)
        {
            $collection->add('jquery.v1.8.3.min.js');
            $collection->add('bootstrap/bootstrap.min.js');
        })->apply('UriRewriteFilter');
    },
    'admin-css' => function($collection)
    {
        $collection->directory('assets/css', function($collection)
        {
            $collection->add('bootstrap.min.css');
            $collection->add('wysihtml5/prettify.css');
            $collection->add('bootstrap-responsive.css');
            $collection->add('wysihtml5/bootstrap-wysihtml5-0.0.2.css');
            $collection->add('style.css');
        })->apply('UriRewriteFilter');
    },
    'admin-js' => function($collection)
    {
        $collection->directory('assets/js', function($collection)
        {
            $collection->add('wysihtml5/wysihtml5-0.3.0.js');
            $collection->add('jquery.v1.8.3.min.js');
            $collection->add('prettify.js');
            $collection->add('bootstrap/bootstrap.min.js');
            $collection->add('wysihtml5/bootstrap-wysihtml5.js');
        })->apply('UriRewriteFilter');
    },

    /*
     // Basset default config
    'application' => function($collection)
    {
        // Switch to the stylesheets directory and require the "less" and "sass" directories.
        // These directories both have a filter applied to them so that the built
        // collection will contain valid CSS.
        $directory = $collection->directory('../app/assets/stylesheets', function($collection)
        {
            $collection->requireDirectory('less')->apply('Less');
            $collection->requireDirectory('sass')->apply('Sass');
            $collection->requireDirectory();
        });

        $directory->apply('CssMin');
        $directory->apply('UriRewriteFilter');

        // Switch to the javascripts directory and require the "coffeescript" directory. As
        // with the above directories we'll apply the CoffeeScript filter to the directory
        // so the built collection contains valid JS.
        $directory = $collection->directory('../app/assets/javascripts', function($collection)
        {
            $collection->requireDirectory('coffeescripts')->apply('CoffeeScript');
            $collection->requireDirectory();
        });

        $directory->apply('JsMin');
    }
    */

);