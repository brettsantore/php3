<?php

namespace Santore\App\Person\Factory;

use Santore\App\Clock\SystemClock;
use Santore\App\Person\PersonObserver;
use SplFileObject;

class PersonObserverFactory
{
    public function __invoke()
    {
        $filePath = 'php://stdin';

        return new PersonObserver(
            new SplFileObject($filePath, 'w'),
            new SystemClock()
        );
    }
}