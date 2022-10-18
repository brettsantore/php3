<?php

use Santore\App\Clock\ClockInterface;
use Santore\App\Container;
use Santore\App\Person\Person;
use Santore\App\Person\PersonObserver;
use Santore\App\Person\PersonService;
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

if (php_sapi_name() == "cli") {
    $name = readline("What is your name? : ");

    $personService->updateName($person, $name ?? null);

    $out = new SplFileObject('php://stdout', 'w');
    $out->fwrite(sprintf(
        'Hello, %s!' . PHP_EOL,
        $name
    ));

} else {
    $personService->updateName($person, $_GET['name'] ?? null);

    $loader = new FilesystemLoader('../views');
    $twig = new Environment($loader);

    $template = $twig->load('index.html');
    echo $template->render([
        'name' => $person->name(),
    ]);
}