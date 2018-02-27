<?php

namespace Binotel;

use Binotel\Request\Params;
use Binotel\Helpers\Formatter;
use Binotel\ModelException;

class Client
{
    public $parameters = null;

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

    public function __get($name)
    {
        $classname = '\\Binotel\\Models\\' . Formatter::toCamelCase($name);

        if (!class_exists($classname)) {
            throw new ModelException('Model not exists: ' . $name);
        }

        $this->parameters->clearPost();

        return new $classname($this->parameters);
    }

    public function addProxy($proxy)
    {
        $this->parameters->addProxy($proxy);
    }
}
