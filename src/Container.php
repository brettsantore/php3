<?php

namespace Santore\App;

use Psr\Container\ContainerInterface;
use Santore\App\Exception\Container\UnableToFind;
use function array_key_exists;

class Container implements ContainerInterface
{
    /**
     * @var array<string, callable>
     */
    private array $container;

    public function __construct($array)
    {
        $this->container = $array;
    }

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw UnableToFind::withKey($id);
        }

        $factory = new $this->container[$id];

        return $factory($this);
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->container);
    }
}