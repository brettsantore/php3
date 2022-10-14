<?php

namespace Santore\App;

use Santore\App\Clock\SystemClock;
use SplFileObject;

class PersonObserverFactory
{
    public static function create($filePath)
    {
        return new PersonObserver(
            new SplFileObject($filePath, 'w'),
            new SystemClock()
        );
    }
}