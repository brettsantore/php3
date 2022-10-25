<?php

namespace Santore\App;

use Closure;
use Psr\Container\ContainerInterface;
use Santore\App\Exception\Container\UnableToFind;
use SplObjectStorage;
use function array_key_exists;

class Container implements ContainerInterface
{
    /**
     * @var array<string, callable>
     */
    private array $container;

    private SplObjectStorage $storage;

    public function __construct($array)
    {
        $this->storage = new SplObjectStorage();
        $this->container = $array;
    }

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw UnableToFind::withKey($id);
        }

        $callable = $this->container[$id];

        if ($callable instanceof Closure) {
            return $callable($this);
        }

        $factory = new $callable;

        return $factory($this);
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->container);
    }
}