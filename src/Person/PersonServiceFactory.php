<?php

namespace Santore\App\Person;

use Psr\Container\ContainerInterface;

class PersonServiceFactory
{
    public function __invoke(ContainerInterface $container): PersonService
    {
        return new PersonService();
    }
}