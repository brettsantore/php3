<?php

use Santore\App\Clock\ClockInterface;
use Santore\App\Container;
use Santore\App\Person\Person;
use Santore\App\Person\PersonObserver;
use Santore\App\Person\PersonService;

require_once '../vendor/autoload.php';

$container = new Container(include '../config/service-locator.php');

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