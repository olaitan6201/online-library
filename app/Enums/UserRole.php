<?php

namespace App\Enums;

enum UserRole: string
{
    public const LIBRARIAN = 'librarian';

    public const READER = 'reader';

    public static function all(): array
    {
        return [
            self::LIBRARIAN,
            self::READER,
        ];
    }
}
