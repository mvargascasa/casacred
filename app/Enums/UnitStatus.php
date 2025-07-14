<?php

namespace App\Enums;

class UnitStatus
{
    const AVAILABLE = 'available';
    const RESERVED = 'reserved';
    const SOLD = 'sold';

    public static function all()
    {
        return [
            self::AVAILABLE,
            self::RESERVED,
            self::SOLD,
        ];
    }
}
