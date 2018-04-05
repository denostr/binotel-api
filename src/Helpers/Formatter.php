<?php

namespace denostr\Binotel\Helpers;

class Formatter
{
    public static function toCamelCase($string)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
    }
}
