<?php namespace Woodling;

class Blueprint
{

    /**
     * @var array Contains attributes set by the user
     */
    protected $attributes = array();

    /**
     * @var array Contains sequenced attributes
     */
    protected $sequences = array();

    /**
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        $this->setAttribute($key, $value);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getAttribute($key);
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        return $this->attributes[$key];
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        $attributes = $this->attributes;
        return $attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @param string $key
     * @param \Closure $closure
     */
    public function sequence($key, $closure)
    {
        $this->setSequence($key, $closure);
    }

    /**
     * @param string $key
     * @param \Closure $closure
     */
    public function setSequence($key, \Closure $closure)
    {
        $this->sequences[$key] = $closure;
    }

    /**
     * @param string $key
     * @return \Closure
     */
    public function getSequence($key)
    {
        return $this->sequences[$key];
    }

    /**
     * @return array
     */
    public function getSequences()
    {
        return $this->sequences;
    }

    /**
     * @param array $sequences
     */
    public function setSequences($sequences)
    {
        $this->sequences = $sequences;
    }

}
