<?php

namespace App\Utils;

class DateUtil
{

    public static function parseToAmericanFormat(string $date): string
    {
        $splitedDate = explode('/', $date);
        $formattedDate = join('-', array_reverse($splitedDate));

        return $formattedDate;
    }

    public static function parseToBrazilianFormat(string $date): string
    {
        $splitedDate = explode('', $date);
        $formattedDate = join('/', array_reverse($splitedDate));

        return $formattedDate;
    }
}
