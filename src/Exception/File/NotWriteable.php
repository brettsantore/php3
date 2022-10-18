<?php

namespace Santore\App\Exception\File;

use RuntimeException;

class NotWriteable extends RuntimeException
{
    public static function withPath($filePath): static
    {
        return new static(sprintf(
            'NotWriteable path [%s] is not writeable',
            $filePath
        ));
    }
}