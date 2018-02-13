<?php

namespace Binotel;

use Binotel\Request\Request;

abstract class Models extends Request
{
    public $parameters;

    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }

    public function setFields($fields)
    {
        foreach ($fields AS $name => $value) {
            $this->parameters->addPost($name, $value);
        }
    }
}