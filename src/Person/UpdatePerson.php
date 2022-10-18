<?php

namespace Santore\App\Person;

class UpdatePerson
{
    public ?string $name;

    public function __construct(public readonly Person $person)
    {
    }
}