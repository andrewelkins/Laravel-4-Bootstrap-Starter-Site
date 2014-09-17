<?php namespace Woodling\Factory;

use \Woodling\Blueprint;
use \Woodling\Sequencer;

class Runner
{

    /**
     * @var Sequencer
     */
    protected $sequencer;
    protected $className;

    /**
     * @param string $className
     */
    public function __construct($className)
    {
        $this->setSequencer(new Sequencer($className));
        $this->setClassName($className);
    }

    /**
     * @param Sequencer $sequencer
     */
    public function setSequencer(Sequencer $sequencer)
    {
        $this->sequencer = $sequencer;
    }

    /**
     * @return Sequencer
     */
    public function getSequencer()
    {
        return $this->sequencer;
    }

    /**
     * @param string $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param string $className
     * @param Blueprint $blueprint
     * @param array $attributeOverrides
     * @return object
     */
    public function make($className, Blueprint $blueprint, $attributeOverrides)
    {
        $instance = new $className();
        $attributes = $attributeOverrides;
        $sequences = array();

        if ( ! empty($attributes[':sequences']))
        {
            $sequences = $attributes[':sequences'];
            unset($attributes[':sequences']);
        }

        $sequences = $sequences + $blueprint->getSequences();
        $this->withSequences($instance, $sequences);

        $attributes = $attributes + $blueprint->getAttributes();
        $this->withAttributes($instance, $attributes);

        return $instance;
    }

    /**
     * @param object $instance
     * @param array $attributes
     */
    public function withAttributes($instance, $attributes)
    {
        foreach($attributes as $key => $value)
        {
            if ($value instanceof \Closure)
            {
                $value = $value();
            }

            $instance->{$key} = $value;
        }
    }

    /**
     * @param object $instance
     * @param array $sequences
     */
    public function withSequences($instance, $sequences)
    {
        foreach($sequences as $key => $sequence)
        {
            $next = $this->getSequencer()->next($key);
            $instance->{$key} = $sequence($next);
        }
    }

}
