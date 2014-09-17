<?php namespace Woodling;

class Repository
{
    /**
     * @var array Stores factories
     */
    protected $store;

    /**
     * @param string $key
     * @param Factory $value
     */
    public function add($key, Factory $value)
    {
        $this->store[$key] = $value;
    }

    /**
     * @param string $key Factory name
     * @return Factory
     */
    public function get($key)
    {
        return $this->store[$key];
    }

    /**
     * @param array $store
     */
    public function setStore($store)
    {
        $this->store = $store;
    }

    /**
     * @return array
     */
    public function getStore()
    {
        return $this->store;
    }

}
