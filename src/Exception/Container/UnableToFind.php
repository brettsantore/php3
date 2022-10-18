<?php

namespace Santore\App\Exception\Container;

use InvalidArgumentException;

class UnableToFind extends InvalidArgumentException
{
    public static function withKey($id): static
    {
        return new static(sprintf(
            'Unable to locate service with id [%s]',
            $id
        ));
    }
}