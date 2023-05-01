<?php

namespace App\Engine\DI;

class DI
{
    private array $container = [];

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value): static
    {
        $this->container[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key): mixed
    {
        return $this->has($key);
    }

    /**
     * @param $key
     * @return bool|null
     */
    public function has($key): mixed
    {
        return $this->container[$key] ?? null;
    }
}
