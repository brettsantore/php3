<?php

namespace Santore\App\Person;

use SplObjectStorage;
use SplObserver;
use SplSubject;

class Person implements SplSubject
{
    private SplObjectStorage $observers;

    public function __construct(private string $name)
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        if ($this->observers->offsetExists($observer)) {
            $this->observers->detach($observer);
        }
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function notify(): void
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}