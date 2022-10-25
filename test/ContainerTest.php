<?php

namespace Santore\App\Test;

use Psr\Container\ContainerInterface;
use Santore\App\Container;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function testItWorks() {
        $container = new Container([
            'a' => function(ContainerInterface $container){
                return true;
            },
        ]);

        $this->assertTrue($container->get('a'));
    }
}
