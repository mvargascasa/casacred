<?php

namespace App\Enums;

class NotificationType
{
    const WARNING = 'WARNING';
    const INFORMATION = 'INFORMATION';
    const CONFIRMATION = 'CONFIRMATION';
    const ERROR = 'ERROR';

    public static function getValues()
    {
        return [
            self::WARNING,
            self::INFORMATION,
            self::CONFIRMATION,
            self::ERROR
        ];
    }
}