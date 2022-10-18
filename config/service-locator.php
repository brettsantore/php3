<?php

use Santore\App\Clock\ClockFactory;
use Santore\App\Clock\ClockInterface;
use Santore\App\Person\Factory\PersonObserverFactory;
use Santore\App\Person\Factory\PersonServiceFactory;
use Santore\App\Person\PersonObserver;
use Santore\App\Person\PersonService;

return [
    ClockInterface::class => ClockFactory::class,
    PersonObserver::class => PersonObserverFactory::class,
    PersonService::class => PersonServiceFactory::class,
];