<?php

namespace App\Services;

class StringHelper
{
    /**
     * возвращает строку без лишних пробелов и переносов строк
     * @param $string
     * @return array|string|string[]
     */
    public static function getSeoTagString($string)
    {
        $string = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $string);
        $string = str_replace(["\r\n", "\r", "\n", "\t", '  ', '    ', '    '], '', $string);
        return $string;
    }
}
