<?php

use Santore\App\Clock\ClockFactory;
use Santore\App\Clock\ClockInterface;
use Santore\App\Person\PersonObserver;
use Santore\App\Person\PersonObserverFactory;
use Santore\App\Person\PersonService;
use Santore\App\Person\PersonServiceFactory;

return [
    ClockInterface::class => ClockFactory::class,
    PersonObserver::class => PersonObserverFactory::class,
    PersonService::class => PersonServiceFactory::class,
];