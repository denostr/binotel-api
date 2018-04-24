<?php

namespace denostr\Binotel\Helpers;

/**
 * Класс для изменения формата данных в строках
 *
 * @package denostr\Binotel\Helpers
 * @author denostr <4deni.kiev@gmail.com>
 * @link https://github.com/denostr/binotel-api
 */
class Formatter
{
    public static function toCamelCase($string)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
    }
}
