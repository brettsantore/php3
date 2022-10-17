<?php

namespace Santore\App;

use Santore\App\Clock\SystemClock;
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