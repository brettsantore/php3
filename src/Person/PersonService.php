<?php

namespace Santore\App\Person;

class PersonService
{
    public function updateName(Person $person, ?string $name): void
    {
        if (empty($name)) {
            return;
        }

        $person->setName($name);
        $person->notify();
    }
}