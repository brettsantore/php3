<?php

use Santore\App\PersonObserverFactory;
use Santore\App\Person;
use Santore\App\PersonService;

require_once '../vendor/autoload.php';

$person = new Person('World');
$person->attach(PersonObserverFactory::create('php://stdout'));

$personService = new PersonService();
$personService->updateName($person, $_GET['name' ?? null]);

printf('Hello, %s!', $person->name());