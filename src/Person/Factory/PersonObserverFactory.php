<?php

namespace Santore\App\Person\Factory;

use Psr\Container\ContainerInterface;
use Santore\App\Clock\ClockInterface;
use Santore\App\Exception\File\NotWriteable;
use Santore\App\Person\PersonObserver;
use SplFileObject;
use function is_file;
use function is_writable;
use function touch;

class PersonObserverFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $logPath = __DIR__ . '/../../../data/audit-log.txt';

        if (!is_file($logPath)) {
            touch($logPath);
        }

        if (!is_writable($logPath)) {
            throw NotWriteable::withPath($logPath);
        }

        $filePath = __DIR__ . '/../../../data/audit-log.txt';

        return new PersonObserver(
            new SplFileObject($filePath, 'a'),
            $container->get(ClockInterface::class)
        );
    }
}