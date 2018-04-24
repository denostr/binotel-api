<?php

namespace denostr\Binotel\Models;

use denostr\Binotel\Model;

/**
 * Модель для работы с настройками виртуальной АТС
 *
 * @package denostr\Binotel\Model
 * @author denostr <4deni.kiev@gmail.com>
 * @link https://github.com/denostr/binotel-api
 */
class Settings extends Model
{
    /**
     * Получение всех сотрудников
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     */
    public function listOfEmployees($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('settings/list-of-employees');

        return $result['listOfEmployees'];
    }

    /**
     * Получение всех сценариев для входящих звонков
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     */
    public function listOfRoutes($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('settings/list-of-routes');

        return $result['listOfRoutes'];
    }

    /**
     * Получение всех голосовых сообщений
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     */
    public function listOfVoiceFiles($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('settings/list-of-voice-files');

        return $result['listOfVoiceFiles'];
    }
}
