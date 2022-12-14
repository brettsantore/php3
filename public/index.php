<?php

use Santore\App\Clock\ClockInterface;
use Santore\App\Container;
use Santore\App\Person\Person;
use Santore\App\Person\PersonObserver;
use Santore\App\Person\PersonService;
use Santore\App\Person\UpdatePerson;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

chdir(__DIR__);

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
$personUpdate = new UpdatePerson($person);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $personUpdate->name = $_POST['name'];
    $personService->update($personUpdate);
}

$loader = new FilesystemLoader('../views');
$twig = new Environment($loader);

$template = $twig->load('index.twig');
echo $template->render([
    'name' => $person->name(),
]);