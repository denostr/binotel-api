<?php

namespace denostr\Binotel;

/**
 * Основной класс для исключений Binotel API
 *
 * @package denostr\Binotel
 * @author denostr <4deni.kiev@gmail.com>
 * @link https://github.com/denostr/binotel-api
 */
class Exception extends \Exception
{
    /**
     * @var array Перечень кодов и сообщений исключений
     */
    protected $errors = [
        '102' => 'No such method',
        '103' => 'Not enough data',
        '104' => 'Wrong data',
        '105' => 'Something went wrong',
        '106' => 'Requests are too frequent',
        '120' => 'Your company is disabled',
        '150' => 'Can`t call to the ext',
    ];

    /**
     * Конструктор исключения
     *
     * @param null|string $message Сообщение исключения
     * @param int $code Код исключения
     */
    public function __construct($message = null, $code = 0)
    {
        if (isset($this->errors[$code])) {
            $message = $this->errors[$code];
        }
        parent::__construct($message, $code);
    }
}
