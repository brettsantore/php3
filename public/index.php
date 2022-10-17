<?php

use Santore\App\Clock\ClockFactory;
use Santore\App\Clock\ClockInterface;
use Santore\App\Container;
use Santore\App\PersonObserver;
use Santore\App\PersonObserverFactory;
use Santore\App\Person;
use Santore\App\PersonService;
use Santore\App\PersonServiceFactory;

require_once '../vendor/autoload.php';

$container = new Container([
    ClockInterface::class => ClockFactory::class,
    PersonObserver::class => PersonObserverFactory::class,
    PersonService::class => PersonServiceFactory::class,
]);

/** @var ClockInterface $clock */
$clock = $container->get(ClockInterface::class);

/** @var PersonObserver $observer */
$observer = $container->get(PersonObserver::class);

/** @var PersonService $personService */
$personService = $container->get(PersonService::class);

$person = new Person('World');
$person->attach($observer);
$personService->updateName($person, $_GET['name'] ?? null);

printf('Hello, %s!', $person->name());