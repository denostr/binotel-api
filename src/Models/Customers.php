<?php

namespace denostr\Binotel\Models;

use denostr\Binotel\Model;

/**
 * Модель для работы с клиентами
 *
 * @package denostr\Binotel\Model
 * @author denostr <4deni.kiev@gmail.com>
 * @link https://github.com/denostr/binotel-api
 */
class Customers extends Model
{
    /**
     * Получение информации о всех клиентах
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Без параметров.
     */
    public function getList($fields = [])
    {
        $this->setFields($fields);

        return $this->getCustomerData($this->request('customers/list'));
    }

    /**
     * Получение информации о клиенте по его идентификатору
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - customerID - идентификатор клиента или идентификаторы клиентов в массиве
     */
    public function takeById($fields = [])
    {
        $this->setFields($fields);

        return $this->getCustomerData($this->request('customers/take-by-id'));
    }

    /**
     * Получение информации о клиентах по метке
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - labelID - идентификатор метки
     */
    public function takeByLabel($fields = [])
    {
        $this->setFields($fields);

        return $this->getCustomerData($this->request('customers/take-by-label'));
    }

    /**
     * Поиск клиентов по имени или номеру телефона
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - subject - имя или номер телефона (можно не полностью)
     */
    public function search($fields = [])
    {
        $this->setFields($fields);

        return $this->getCustomerData($this->request('customers/search'));
    }

    /**
     * Создание нового клиента
     *
     * @param array $fields
     * @return bool
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - numbers - номера телефонов в массиве, номера должны быть уникальными
     *
     * Дополнительные параметры:
     * - description - информация о клиенте
     * - email - email клиента
     * - assignedToEmployeeNumber - внутренний номер сотрудника в АТС Binotel
     * - labels - идентификаторы меток в массиве
     */
    public function create($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('customers/create');

        return ($result['status'] === 'success');
    }

    /**
     * Редактирование клиента
     *
     * @param array $fields
     * @return bool
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - id - идентификатор клиента
     *
     * Дополнительные параметры:
     * - name - имя клиента, имя должно быть уникальным
     * - numbers - номера телефонов в массиве, номера должны быть уникальными
     * - description - информация о клиенте
     * - email - email клиента
     * - assignedToEmployeeNumber - внутренний номер сотрудника в АТС Binotel
     * - labels - массив клиента с идентификаторами меток
     *
     * Важно: все переданные дополнительные параметры, будут перезаписаны.
     */
    public function update($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('customers/update');

        return ($result['status'] === 'success');
    }

    /**
     * Удаление клиента
     *
     * @param array $fields
     * @return bool
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - customerID - идентификаторы клиентов в массиве
     */
    public function delete($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('customers/delete');

        return ($result['status'] === 'success');
    }

    /**
     * Получение всех меток
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     */
    public function listOfLabels($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('customers/listOfLabels');

        return $result['listOfLabels'];
    }

    /**
     * Получение пользовательских данных из ответа
     *
     * @param $result
     * @return mixed
     */
    private function getCustomerData($result)
    {
        return $result['callDetails'];
    }
}
