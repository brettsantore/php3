<?php

namespace Santore\App;

use Santore\App\Clock\ClockInterface;
use SplFileObject;
use SplObserver;
use SplSubject;
use const PHP_EOL;

class PersonObserver implements SplObserver
{
    const TIME_FORMAT = 'D M d H:i:s Y';

    public function __construct(
        private readonly SplFileObject $file,
        private readonly ClockInterface $clock
    ) {
    }

    /**
     * @param SplSubject $subject
     */
    public function update(SplSubject $subject): void
    {
        $this->file->fwrite(sprintf(
            '[%s] Name set to [%s]' . PHP_EOL,
            $this->clock->now()->format(self::TIME_FORMAT),
            $subject->name() // How do we type hint
        ));
    }
}