<?php namespace Woodling;

/**
 * Woodling facade
 */

class Woodling
{

    /**
     * @var Core
     */
    protected static $core;

    /**
     * @return Core
     */
    public static function init()
    {
        static::$core = new Core();
        static::$core->finder->findBlueprints();
    }

    public static function reset()
    {
        static::$core = NULL;
    }

    /**
     * Returns Woodling::$core. If no core set, will run Woodling::init(). If $core is
     * passed as an argument, will set that core and then return it.
     * 
     * @param Core $core
     * @return Core
     */
    public static function core(Core $core = NULL)
    {
        if ($core)
        {
            static::$core = $core;
        }

        else if (static::$core === NULL)
        {
            static::init();
        }

        return static::$core;
    }

    /**
     * Returns (and initializes if none set) an instance of Woodling\Core
     *
     * @deprecated Since v0.2
     * @return Core
     */
    public static function getCore()
    {
        return static::core();
    }

    /**
     * Sets a Woodling\Core instance
     *
     * @param \Woodling\Core $core
     * @deprecated Since v0.2
     */
    public static function setCore(Core $core)
    {
        static::core($core);
    }

    /**
     * Returns a factory for your seed
     *
     * @param $factoryName Factory for Seed definition
     * @return \Woodling\Factory
     */
    public static function factory($factoryName)
    {
        return static::core()->getFactory($factoryName);
    }

    /**
     * Creates a new blueprint and stores it in repository.
     * 
     * @param string $className
     * @param \Closure|array $params
     */
    public static function seed($className, $params)
    {
        static::core()->seed($className, $params);
    }

    /**
     * Returns an instance of your class with attributes defined in blueprint.
     * 
     * @param string $className
     * @param array $attributeOverrides
     * @return object
     */
    public static function retrieve($className, $attributeOverrides = array())
    {
        return static::core()->retrieve($className, $attributeOverrides);
    }

    /**
     * Returns a saved instance of your class with attributes defined in blueprint.
     * 
     * @param string $className
     * @param array $attributeOverrides
     * @return object
     */
    public static function saved($className, $attributeOverrides = array())
    {
        return static::core()->saved($className, $attributeOverrides);
    }

    /**
     * Returns an array of your class instances.
     * 
     * @param string $className
     * @param int $count
     * @param array $attributeOverrides
     * @return array
     */
    public static function retrieveList($className, $count, $attributeOverrides = array())
    {
        return static::core()->retrieveList($className, $count, $attributeOverrides);
    }

    /**
     * Returns an array of your class' saved instances
     * 
     * @param string $className
     * @param int $count
     * @param array $attributeOverrides
     * @return array
     */
    public static function savedList($className, $count, $attributeOverrides = array())
    {
        return static::core()->savedList($className, $count, $attributeOverrides);
    }

}
