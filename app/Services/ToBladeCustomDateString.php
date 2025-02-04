<?php

declare(strict_types=1);

namespace App\Services;

use DateTime;

class ToBladeCustomDateString
{
    public static function toString(string $dateTimeStrongFromModel, int|float $estimation)
    {
        $dateTime = DateTime::createFromFormat("Y-m-d H:i:s", $dateTimeStrongFromModel);
        return $dateTime->format("Y-m-d");
    }
}
