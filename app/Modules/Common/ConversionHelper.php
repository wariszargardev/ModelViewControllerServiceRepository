<?php

declare(strict_types=1);

namespace App\Modules\Common;

abstract class ConversionHelper
{
    public static function stringToInt($str): ?int
    {
        if($str !== null){
            return (int) $str;
        }

        return null;
    }
}
