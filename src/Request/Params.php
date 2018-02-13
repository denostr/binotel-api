<?php

namespace Binotel\Request;

class Params
{
    private $authParams = [];

    private $postParams = [];

    private $proxy = null;

    public function addAuth($name, $value)
    {
        $this->authParams[$name] = $value;

        return $this;
    }

    public function getAuth($name = null)
    {
        if ($name !== null) {
            return isset($this->authParams[$name]) ? $this->authParams[$name] : null;
        }

        return $this->authParams;
    }

    public function addPost($name, $value)
    {
        $this->postParams[$name] = $value;

        return $this;
    }

    public function getPost($name = null)
    {
        if ($name !== null) {
            return isset($this->postParams[$name]) ? $this->postParams[$name] : null;
        }

        return $this->postParams;
    }

    public function getPostList()
    {
        return $this->postParams;
    }

    public function hasPost()
    {
        return count($this->postParams) ? true : false;
    }

    public function clearPost()
    {
        $this->postParams = [];

        return $this;
    }

    public function addProxy($proxy)
    {
        $this->proxy = $proxy;

        return $this;
    }

    public function getProxy()
    {
        return $this->proxy;
    }

    public function hasProxy()
    {
        return is_string($this->proxy);
    }
}