<?php

use Santore\App\PersonObserverFactory;
use Santore\App\Person;

require_once '../vendor/autoload.php';

$person = new Person('World');
$person->attach(PersonObserverFactory::create('php://stdout'));

if (isset($_GET['name'])) {
    $person->setName($_GET['name']);
}

printf('Hello, %s!', $person->name());