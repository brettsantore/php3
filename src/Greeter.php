<?php

namespace Santore\App;

class Greeter
{
    public static function greet(string $name)
    {
        return sprintf('Hello, %s!', $name);
    }
}