<?php

namespace Binotel\Models;

use Binotel\Models;

class Customers extends Models
{
    public function getList($fields = [])
    {
        $this->setFields($fields);

        return $this->getCustomerData($this->request('customers/list'));
    }

    public function takeById($fields = [])
    {
        $this->setFields($fields);

        return $this->getCustomerData($this->request('customers/take-by-id'));
    }

    public function takeByLabel($fields = [])
    {
        $this->setFields($fields);

        return $this->getCustomerData($this->request('customers/take-by-label'));
    }

    public function search($fields = [])
    {
        $this->setFields($fields);

        return $this->getCustomerData($this->request('customers/search'));
    }

    public function create($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('customers/create');

        return ($result['status'] === 'success');
    }

    public function update($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('customers/update');

        return ($result['status'] === 'success');
    }

    public function delete($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('customers/delete');

        return ($result['status'] === 'success');
    }

    public function listOfLabels($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('customers/listOfLabels');

        return $result['listOfLabels'];
    }

    private function getCustomerData($result)
    {
        return $result['callDetails'];
    }
}