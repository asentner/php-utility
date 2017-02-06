<?php

namespace PhpUtility\Console;

class Environment implements \ArrayAccess
{
    /**
     * @var array
     */
    protected $env;

    /**
     * @param array $env
     */
    public function __construct(array $env)
    {
        $this->env = $env;
    }

    /**
     * @param mixed $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->env[$key]);
    }

    /**
     * @param mixed $key
     */
    public function __unset($key)
    {
        unset($this->env[$key]);
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->env[] = $value;
        } else {
            $this->env[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->env[$offset]);
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->env[$offset]);
        }
    }

    /**
     * @param mixed $offset
     * @return null
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->env[$offset] : null;
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->env[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->env[$key];
    }

    public function toArray()
    {
        return $this->env;
    }
}
