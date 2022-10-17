<?php

namespace Santore\App\Clock;

use Psr\Container\ContainerInterface;

class ClockFactory
{
    public function __invoke(ContainerInterface $container ): ClockInterface
    {
        return new SystemClock();
    }
}
