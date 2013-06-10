<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Production Environment
    |--------------------------------------------------------------------------
    |
    | Basset needs to know what your production environment is so that it can
    | respond with the correct assets. When in production Basset will attempt
    | to return any built collections. If a collection has not been built
    | Basset will dynamically route to each asset in the collection and apply
    | the filters.
    |
    | The last method can be very taxing so it's highly recommended that
    | collections are built when deploying to a production environment.
    |
    | You can supply an array of production environment names if you need to.
    |
    */

    'production' => array('production', 'prod'),

    /*
    |--------------------------------------------------------------------------
    | Build Path
    |--------------------------------------------------------------------------
    |
    | When assets are built with Artisan they will be stored within a directory
    | relative to the public directory.
    |
    | If the directory does not exist Basset will attempt to create it.
    |
    */

    'build_path' => 'assets/compiled',

    /*
    |--------------------------------------------------------------------------
    | Debug
    |--------------------------------------------------------------------------
    |
    | Enable debugging to have potential errors or problems encountered
    | during operation logged to a rotating file setup.
    |
    */

    'debug' => false,

    /*
    |--------------------------------------------------------------------------
    | Node Paths
    |--------------------------------------------------------------------------
    |
    | Many filters use Node to build assets. We recommend you install your
    | Node modules locally at the root of your application, however you can
    | specify additional paths to your modules.
    |
    */

    'node_paths' => array(

        base_path().'/node_modules'

    ),

    /*
    |--------------------------------------------------------------------------
    | Gzip Built Collections
    |--------------------------------------------------------------------------
    |
    | To get the most speed and compression out of Basset you can enable Gzip
    | for every collection that is built via the command line. This is applied
    | to both collection builds and development builds.
    |
    | You can use the --gzip switch for on-the-fly Gzipping of collections.
    |
    */

    'gzip' => false

);
