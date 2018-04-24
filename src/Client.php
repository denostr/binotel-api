<?php

namespace denostr\Binotel;

use denostr\Binotel\Request\Params;
use denostr\Binotel\ModelException;
use denostr\Binotel\Helpers\Formatter;

/**
 * Основной класс для доступа к моделям
 *
 * @package denostr\Binotel
 * @author denostr <4deni.kiev@gmail.com>
 * @link https://github.com/denostr/binotel-api
 * @property \denostr\Binotel\Models\Calls $calls
 * @property \denostr\Binotel\Models\Customers $customers
 * @property \denostr\Binotel\Models\Settings $ettings
 * @property \denostr\Binotel\Models\Stats $statsx
 */
class Client
{
    /**
     * @var Params|null Экземпляр Params для хранения аргументов
     */
    public $parameters = null;

    /**
     * Client конструктор.
     *
     * @param string $key API ключ пользователя
     * @param string $secret API секрет
     * @param string $apiHost Хост для взаимодействия с API
     * @param string $apiVersion Версия API
     * @param string $apiFormat Формат ответов
     * @param bool $disableSSLChecks Отключение проверки SSL
     */
    public function __construct(
        $key,
        $secret,
        $apiHost = 'https://api.binotel.com/api/',
        $apiVersion = '2.0',
        $apiFormat = 'json',
        $disableSSLChecks = false
    ) {
        $this->parameters = new Params();
        $this->parameters->addAuth('key', $key);
        $this->parameters->addAuth('secret', $secret);
        $this->parameters->addAuth('apiHost', $apiHost);
        $this->parameters->addAuth('apiVersion', $apiVersion);
        $this->parameters->addAuth('apiFormat', $apiFormat);
        $this->parameters->addAuth('disableSSLChecks', $disableSSLChecks);
    }

    /**
     * Метод обеспечивающий взаимодействие с моделью
     *
     * @param $name
     * @return mixed
     * @throws \denostr\Binotel\ModelException
     */
    public function __get($name)
    {
        $classname = 'denostr\\Binotel\\Models\\' . Formatter::toCamelCase($name);

        if (!class_exists($classname)) {
            throw new ModelException('Model not exists: ' . $name);
        }

        $this->parameters->clearPost();

        return new $classname($this->parameters);
    }

    /**
     * Метод позволяющий задать прокси
     *
     * @param string $proxy
     */
    public function addProxy($proxy)
    {
        $this->parameters->addProxy($proxy);
    }
}
