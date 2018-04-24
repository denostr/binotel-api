<?php

namespace denostr\Binotel\Request;

/**
 * Класс для работы с параметрами запроса
 *
 * @package denostr\Binotel\Request
 * @author denostr <4deni.kiev@gmail.com>
 * @link https://github.com/denostr/binotel-api
 */
class Params
{
    /**
     * @var array Данные для авторизации
     */
    private $authParams = [];

    /**
     * @var array POST данные
     */
    private $postParams = [];

    /**
     * @var null Данные для прокси
     */
    private $proxy = null;

    /**
     * Добавить параметры для авторизации
     *
     * @param string $name Имя параметра
     * @param string $value Значение параметра
     * @return $this
     */
    public function addAuth($name, $value)
    {
        $this->authParams[$name] = $value;

        return $this;
    }

    /**
     * Получение параметров для авторизации
     *
     * @param null|string $name Имя параметра
     * @return array|mixed|null
     */
    public function getAuth($name = null)
    {
        if ($name !== null) {
            return isset($this->authParams[$name]) ? $this->authParams[$name] : null;
        }

        return $this->authParams;
    }

    /**
     * Добавление POST данных
     *
     * @param string $name Название параметра
     * @param string $value Значение параметра
     * @return $this
     */
    public function addPost($name, $value)
    {
        $this->postParams[$name] = $value;

        return $this;
    }

    /**
     * Получение POST данных
     *
     * @param null|string $name Название параметра
     * @return array|mixed|null
     */
    public function getPost($name = null)
    {
        if ($name !== null) {
            return isset($this->postParams[$name]) ? $this->postParams[$name] : null;
        }

        return $this->postParams;
    }

    /**
     * Получение всех POST данных списком
     *
     * @return array
     */
    public function getPostList()
    {
        return $this->postParams;
    }

    /**
     * Проверка наличия POST данных
     *
     * @return bool
     */
    public function hasPost()
    {
        return count($this->postParams) ? true : false;
    }

    /**
     * Очистить POST данные
     *
     * @return $this
     */
    public function clearPost()
    {
        $this->postParams = [];

        return $this;
    }

    /**
     * Задать прокси
     *
     * @param string $proxy Данные прокси
     * @return $this
     */
    public function addProxy($proxy)
    {
        $this->proxy = $proxy;

        return $this;
    }

    /**
     * Получение параметров прокси
     *
     * @return null
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * Проверка наличия прокси
     *
     * @return bool
     */
    public function hasProxy()
    {
        return is_string($this->proxy);
    }
}
