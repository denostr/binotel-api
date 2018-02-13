<?php

namespace Binotel\Helpers;

class Formatter
{
    static public function toCamelCase($string)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
    }
}
