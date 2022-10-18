<?php

namespace Santore\App\Person\Factory;

use Psr\Container\ContainerInterface;
use Santore\App\Person\PersonService;

class PersonServiceFactory
{
    public function __invoke(ContainerInterface $container): PersonService
    {
        return new PersonService();
    }
}