<?php

namespace denostr\Binotel\Models;

use denostr\Binotel\Model;

/**
 * Модель для работы со статистикой звонков
 *
 * @package denostr\Binotel\Model
 * @author denostr <4deni.kiev@gmail.com>
 * @link https://github.com/denostr/binotel-api
 */
class Stats extends Model
{
    /**
     * Получение всех входящих звонков за выбранный период времени
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - startTime - время начала выбора звонков (в формате unix timestamp)
     * - stopTime - время окончания выбора звонков (в формате unix timestamp)
     */
    public function incomingCallsForPeriod($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/incoming-calls-for-period'));
    }

    /**
     * Получение всех исходящих звонков за выбранный период времени
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - startTime - время начала выбора звонков (в формате unix timestamp)
     * - stopTime - время окончания выбора звонков (в формате unix timestamp)
     */
    public function outgoingCallsForPeriod($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/outgoing-calls-for-period'));
    }

    /**
     * Получение всех CallTracking за выбранный период времени
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - startTime - время начала выбора звонков (в формате unix timestamp)
     * - stopTime - время окончания выбора звонков (в формате unix timestamp)
     */
    public function callTrackingCallsForPeriod($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/calltracking-calls-for-period'));
    }

    /**
     * Получение всех входящих звонков начиная с выбранного времени по настоящее
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - timestamp - время начала выбора звонков (в формате unix timestamp)
     */
    public function allIncomingCallsSince($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/all-incoming-calls-since'));
    }

    /**
     * Получение всех исходящих звонков начиная с выбранного времени по настоящее
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - timestamp - время начала выбора звонков (в формате unix timestamp)
     */
    public function allOutgoingCallsSince($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/all-outgoing-calls-since'));
    }

    /**
     * Получение звонков которые сейчас в онлайне
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     */
    public function onlineCalls($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/online-calls'));
    }

    /**
     * Получение всех звонков за день
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - dayInTimestamp - день (в формате unix timestamp, при отсутствии этого параметра звонки буду взяты за сегодня)
     */
    public function listOfCallsPerDay($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/list-of-calls-per-day'));
    }

    /**
     * Получение всех звонков за выбранный период времени
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - startTime - время начала выбора звонков (в формате unix timestamp)
     * - stopTime - время окончания выбора звонков (в формате unix timestamp)
     *
     * Ограничения:
     * - период не более 24 часов
     */
    public function listOfCallsForPeriod($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/list-of-calls-for-period'));
    }

    /**
     * Получение всех звонков сотрудника за выбранный период времени, по его внутреннему номеру
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - internalNumber - внутренний номер сотрудника
     * - startTime - время начала выбора звонков (в формате unix timestamp)
     * - stopTime - время окончания выбора звонков (в формате unix timestamp)
     *
     * Ограничения:
     * - период не более 7 дней
     */
    public function listOfCallsByInternalNumberForPeriod($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/list-of-calls-by-internal-number-for-period'));
    }

    /**
     * Получение пропущенных звонков за сегодня
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     */
    public function listOfLostCallsToday($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/list-of-lost-calls-today'));
    }

    /**
     * Получение всех звонков по номеру телефона
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - number - номер или номера в массиве
     */
    public function historyByNumber($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/history-by-number'));
    }

    /**
     * Получение всех звонков по идентификатору клиента
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - customerID - идентификатор клиента или идентификаторы клиентов в массиве
     */
    public function historyByCustomerId($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/history-by-customer-id'));
    }

    /**
     * Получение недавних звонков по внутреннему номеру сотрудника
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - internalNumber - внутренний номер сотрудника
     *
     * Ограничения:
     * - звонки за последние 2 недели и не более 50 звонков.
     */
    public function recentCallsByInternalNumber($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/recent-calls-by-internal-number'));
    }

    /**
     * Получение информации о звонке по идентификатору
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - generalCallID - идентификатор звонка или массив c идентификаторами звонков
     */
    public function callDetails($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/call-details'));
    }

    /**
     * Получение ссылки на запись разговора
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - callID - идентификатор записи разговора
     *
     * Ограничения:
     * - время жизни ссылки на запись разговора 15 минут
     */
    public function callRecord($fields = [])
    {
        $this->setFields($fields);

        $record = $this->request('stats/call-record');

        return $record['url'];
    }

    /**
     * Получение информации о звонке из ответа
     *
     * @param $result
     * @return mixed
     */
    private function getCallDetails($result)
    {
        return $result['callDetails'];
    }
}
