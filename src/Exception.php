<?php

namespace Binotel;


class Exception extends \Exception
{
    protected $errors = [
        '102' => 'No such method',
        '103' => 'Not enough data',
        '104' => 'Wrong data',
        '105' => 'Something went wrong',
        '106' => 'Requests are too frequent',
        '120' => 'Your company is disabled',
        '150' => 'Can`t call to the ext',
    ];

    public function __construct($message = null, $code = 0)
    {
        if (isset($this->errors[$code])) {
            $message = $this->errors[$code];
        }
        parent::__construct($message, $code);
    }
}