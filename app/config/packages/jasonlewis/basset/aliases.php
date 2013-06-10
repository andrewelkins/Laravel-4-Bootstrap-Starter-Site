<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Asset and Filter Aliases
    |--------------------------------------------------------------------------
    |
    | You can define aliases for commonly used assets or filters.
    | An example of an asset alias:
    |
    |   'layout' => 'stylesheets/layout/master.css'
    |
    | Filter aliases are slightly different. You can define a simple alias
    | similar to an asset alias.
    |
    |   'YuiCss' => 'Yui\CssCompressorFilter'
    |
    | However if you want to pass in options to an aliased filter then define
    | the alias as a nested array. The key should be the filter and the value
    | should be a callback closure where you can set parameters for a filters
    | constructor, etc.
    |
    |   'YuiCss' => array('Yui\CssCompressorFilter', function($filter)
    |   {
    |       $filter->setArguments('path/to/jar');
    |   })
    |
    |
    */

    'assets' => array(),

    'filters' => array(

        /*
        |--------------------------------------------------------------------------
        | Less Filter Alias
        |--------------------------------------------------------------------------
        |
        | Filter is applied only when asset has a ".less" extension and it will
        | attempt to find missing constructor arguments.
        |
        */

        'Less' => array('LessFilter', function($filter)
        {
            $filter->whenAssetIs('.*\.less')->findMissingConstructorArgs();
        }),

        /*
        |--------------------------------------------------------------------------
        | Sass Filter Alias
        |--------------------------------------------------------------------------
        |
        | Filter is applied only when asset has a ".sass" or ".scss" extension and
        | it will attempt to find missing constructor arguments.
        |
        */

        'Sass' => array('Sass\ScssFilter', function($filter)
        {
            $filter->whenAssetIs('.*\.(sass|scss)')->findMissingConstructorArgs();
        }),

        /*
        |--------------------------------------------------------------------------
        | CoffeeScript Filter Alias
        |--------------------------------------------------------------------------
        |
        | Filter is applied only when asset has a ".coffee" extension and it will
        | attempt to find missing constructor arguments.
        |
        */

        'CoffeeScript' => array('CoffeeScriptFilter', function($filter)
        {
            $filter->whenAssetIs('.*\.coffee')->findMissingConstructorArgs();
        }),

        /*
        |--------------------------------------------------------------------------
        | CssMin Filter Alias
        |--------------------------------------------------------------------------
        |
        | Filter is applied only when within the production environment and when
        | the "CssMin" class exists.
        |
        */

        'CssMin' => array('CssMinFilter', function($filter)
        {
            $filter->whenAssetIsStylesheet()->whenProductionBuild()->whenClassExists('CssMin');
        }),

        /*
        |--------------------------------------------------------------------------
        | JsMin Filter Alias
        |--------------------------------------------------------------------------
        |
        | Filter is applied only when within the production environment and when
        | the "JsMin" class exists.
        |
        */

        'JsMin' => array('JSMinFilter', function($filter)
        {
            $filter->whenAssetIsJavascript()->whenProductionBuild()->whenClassExists('JSMin');
        }),

        /*
        |--------------------------------------------------------------------------
        | UriRewrite Filter Alias
        |--------------------------------------------------------------------------
        |
        | Filter gets a default argument of the path to the public directory.
        |
        */

        'UriRewriteFilter' => array('UriRewriteFilter', function($filter)
        {
            $filter->setArguments(public_path());
        })

    )

);