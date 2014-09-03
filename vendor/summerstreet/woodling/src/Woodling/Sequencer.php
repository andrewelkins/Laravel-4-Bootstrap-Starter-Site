<?php namespace Woodling;

class Sequencer
{

    /**
     * @var array Counters repository
     */
    protected static $counters = array();

    /**
     * @var string Namespace for counters
     */
    protected $namespace;

    /**
     * @param string $namespace
     */
    public function __construct($namespace = null)
    {
        $this->setNamespace($namespace);
    }

    public static function reset()
    {
        static::setCounters(array());
    }

    /**
     * @param string $key
     * @return int
     */
    public function next($key)
    {
        $namespace = $this->getNamespace();

        if ( ! empty($namespace))
        {
            $key = $namespace . '.' . $key; // Startled person smiley
        }

        if ( ! empty(static::$counters[$key]))
        {
            $next = static::$counters[$key] + 1;
        }

        else
        {
            $next = 1;
        }

        return static::$counters[$key] = $next;
    }

    /**
     * @return array
     */
    public static function getCounters()
    {
        return static::$counters;
    }

    /**
     * @param array $counters
     */
    public static function setCounters($counters)
    {
        static::$counters = $counters;
    }

    /**
     * @param string $namespace
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

}
