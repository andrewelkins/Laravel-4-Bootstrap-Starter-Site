<?php namespace Woodling;

class Factory
{

    /**
     * @var Blueprint Tampered instance of Blueprint
     */
    protected $blueprint;

    /**
     * @var string Name of the class that will be returned by the factory
     */
    protected $className;

    /**
     * @var Factory\Runner
     */
    protected $runner;

    /**
     * @param string $className
     * @param Blueprint $blueprint
     */
    public function __construct($className, Blueprint $blueprint)
    {
        $this->setClassName($className);
        $this->setBlueprint($blueprint);
        $this->setRunner(new Factory\Runner($className));
    }

    /**
     * @param Blueprint $blueprint
     */
    public function setBlueprint(Blueprint $blueprint)
    {
        $this->blueprint = $blueprint;
    }

    /**
     * @return Blueprint
     */
    public function getBlueprint()
    {
        return $this->blueprint;
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
     * @param Factory\Runner $runner
     */
    public function setRunner(Factory\Runner $runner)
    {
        $this->runner = $runner;
    }

    /**
     * @return Factory\Runner
     */
    public function getRunner()
    {
        return $this->runner;
    }

    /**
     * @param array $attributeOverrides
     * @return object
     */
    public function make($attributeOverrides = array())
    {
        $className = $this->getClassName();
        $blueprint = $this->getBlueprint();
        $instance = $this->getRunner()->make($className, $blueprint, $attributeOverrides);
        return $instance;
    }

    /**
     * @param $attributeOverrides
     * @return object
     */
    public function retrieve($attributeOverrides)
    {
        return $this->make($attributeOverrides);
    }

}
