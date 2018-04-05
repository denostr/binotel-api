<?php

namespace denostr\Binotel;

use denostr\Binotel\Request\Request;

abstract class Model extends Request
{
    public $parameters;

    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }

    public function setFields($fields)
    {
        foreach ($fields as $name => $value) {
            $this->parameters->addPost($name, $value);
        }
    }
}
