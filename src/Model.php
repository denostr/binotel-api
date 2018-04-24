<?php

namespace denostr\Binotel;

use denostr\Binotel\Request\Request;

/**
 * Базовый класс моделей
 *
 * @package denostr\Binotel
 * @author denostr <4deni.kiev@gmail.com>
 * @link https://github.com/denostr/binotel-api
 */
abstract class Model extends Request
{
    /**
     * @var \denostr\Binotel\Request\Params Экземпляр Params для хранения аргументов
     */
    public $parameters;

    /**
     * Конструктор моделей
     *
     * @param array $parameters
     */
    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Метод для добавления POST данных в запрос
     *
     * @param array $fields
     */
    public function setFields($fields)
    {
        foreach ($fields as $name => $value) {
            $this->parameters->addPost($name, $value);
        }
    }
}
