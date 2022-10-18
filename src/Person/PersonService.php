<?php

namespace Santore\App\Person;

class PersonService
{
    public function update(UpdatePerson $updatePerson): void
    {
        if (empty($updatePerson->name)) {
            return;
        }   

        $updatePerson->person->setName($updatePerson->name);
        $updatePerson->person->notify();
    }
}