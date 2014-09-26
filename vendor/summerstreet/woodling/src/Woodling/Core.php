<?php namespace Woodling;

class Core
{

    /**
     * @var Repository Contains user created blueprints
     */
    public $repository;

    /**
     * @var Finder Loads user defined blueprints
     */
    public $finder;

    /**
     * @var string This method will be called when you try to retrieve saved instance
     */
    public $persistMethod = 'save';

    public function __construct()
    {
        $this->repository = new Repository();
        $this->finder = new Finder();
    }

    /**
     * Returns a factory with specified name
     *
     * @param $factoryName
     * @return Factory
     */
    public function getFactory($factoryName)
    {
        return $this->repository->get($factoryName);
    }

    /**
     * Lets you define a blueprint for your class
     *
     * @param string $className
     * @param \Closure|array $params
     * @throws \InvalidArgumentException
     */
    public function seed($className, $params)
    {
        $blueprint = new Blueprint();
        $consequence = $params;
        $class = $className;

        if (is_array($params))
        {
            if (empty($params['do']))
            {
                throw new \InvalidArgumentException('Fixture template not supplied.');
            }

            if ( ! empty($params['class']))
            {
                $class = $params['class'];
            }

            $consequence = $params['do'];
        }

        // Work that blueprint!
        $consequence($blueprint);

        $factory = new Factory($class, $blueprint);
        $this->repository->add($className, $factory);
    }

    /**
     * Creates an instance of your class using your blueprint
     *
     * @param string $className
     * @param array $attributeOverrides
     * @return object
     */
    public function retrieve($className, $attributeOverrides = array())
    {
        $factory = $this->getFactory($className);
        return $factory->make($attributeOverrides);
    }

    /**
     * Creates an instance of your class and calls save() on it
     *
     * @param string $className
     * @param array $attributeOverrides
     * @return object
     */
    public function saved($className, $attributeOverrides = array())
    {
        $instance = $this->retrieve($className, $attributeOverrides);
        $instance->{$this->persistMethod}();
        return $instance;
    }

    /**
     * Returns an array containing specified amount of model instances
     *
     * @param string $className
     * @param int $count
     * @param array $attributeOverrides
     * @return array
     */
    public function retrieveList($className, $count, $attributeOverrides = array())
    {
        $list = array();

        for ($i = 0; $i < $count; $i++)
        {
            $list[] = $this->retrieve($className, $attributeOverrides);
        }

        return $list;
    }

    /**
     * Returns an array containing specified amount of persisted model instances
     *
     * @param string $className
     * @param int $count
     * @param array $attributeOverrides
     * @return array
     */
    public function savedList($className, $count, $attributeOverrides = array())
    {
        $list = array();

        for ($i = 0; $i < $count; $i++)
        {
            $list[] = $this->saved($className, $attributeOverrides);
        }

        return $list;
    }

}
