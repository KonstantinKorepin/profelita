<?php

namespace App\Services;

class StringHelper
{
    /**
     * Возвращает строку без лишних пробелов и переносов строк
     * @param $string
     * @return array|string|string[]
     */
    public static function getSeoTagString($string)
    {
        $string = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $string);
        $string = str_replace(["\r\n", "\r", "\n", "\t", '  ', '    ', '    '], '', $string);
        return $string;
    }

    /**
     * Возвращает номер телефона без пробелов и тире
     * @param $phone
     * @return array|string|string[]|null
     */
    public static function getClearPhone($phone)
    {
        return preg_replace('/[\s-]/', '', $phone);
    }
}
