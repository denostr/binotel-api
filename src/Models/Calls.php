<?php

namespace denostr\Binotel\Models;

use denostr\Binotel\Model;

/**
 * Модель инициализации звонков
 *
 * @package denostr\Binotel\Model
 * @author denostr <4deni.kiev@gmail.com>
 * @link https://github.com/denostr/binotel-api
 */
class Calls extends Model
{
    /**
     * Инициирование двустороннего звонка с внутренней линией и внешним номером.
     *
     * @param array $fields Массив параметров
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * - ext_number - внутренний номер сотрудника (первый участник разговора)
     * - phone_number - телефонный номер куда нужно позвонить (второй участник разговора)
     *
     * Дополнительные параметры:
     * — callTimeToExt - длительность дозвона на внутреннюю линию (по умолчанию 30 секунд)
     * — limitCallTime - ограничение длительности звонка в секундах
     * — playbackWaiting - проигрывание, первому участнику разговора сообщения:
     *      "ожидайте пожалуйста на линии, происходит соединение со 2-м участником разговора".
     *      По умолчанию TRUE, принимает значения: TRUE или FALSE.
     * — trunkNumber - номер через который будет совершаться звонок на телефонный номер
     * — callerIdForEmployee - смена отображения информации о номере куда будем звонить на экране телефона у сотрудника,
     *      по умолчанию отображается телефонный номер куда нужно позвонить.
     *      В основном данный параметр используется для скрытия телефонного номера от сотрудника
     *      (примеры: Private или CRM client id 3320).
     * - async - не дожидаться результата звонка на внутреннюю линию.
     *      По умолчанию FALSE, принимает значения: TRUE или FALSE.
     */
    public function extToPhone($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('calls/ext-to-phone');

        return $result['generalCallID'];
    }

    /**
     * Инициирование двустороннего звонка c двумя внешними номерами.
     *
     * @param array $fields
     * @return mixed
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Основные параметры:
     * — phoneNumber1 - первый внешний номер
     * — phoneNumber2 - второй внешний номер
     * — trunkNumber - номер через который будут совершаться оба звонка
     *
     * Дополнительные параметры:
     * — limitCallTime  - ограничение длительности звонка в секундах
     * — playbackWaiting - проигрывание, первому участнику разговора, фразы:
     *      "ожидайте пожалуйста на линии, происходит соединение со 2-м участником разговора".
     *      По умолчанию стоит TRUE, принимает значения: TRUE или FALSE.
     */
    public function phoneToPhone($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('calls/phone-to-phone');

        return $result['generalCallID'];
    }

    /**
     * Перевод звонка
     *
     * @param array $fields
     * @return bool
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * — generalCallID - идентификатор звонка
     * - phone_number - номер на который переводится звонок
     */
    public function attendedCallTransfer($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('calls/attended-call-transfer');

        return ($result['status'] === 'success');
    }

    /**
     * Завершение звонка
     *
     * @param array $fields
     * @return bool
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * — generalCallID  - идентификатор звонка
     */
    public function hangupCall($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('calls/hangup-call');

        return ($result['status'] === 'success');
    }

    /**
     * Звонок с проигрыванием голосового файла
     *
     * @param array $fields
     * @return bool
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * — phone_number  - телефонный номер кому будет проигрываться оповещение
     * - voiceFileID  - идентификатор голосового файла
     */
    public function callWithAnnouncement($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('calls/call-with-announcement');

        return ($result['status'] === 'success');
    }

    /**
     * Звонок с голосовым меню
     *
     * @param array $fields
     * @return bool
     * @throws \denostr\Binotel\Exception
     * @throws \denostr\Binotel\NetworkException
     *
     * Обязательные параметры:
     * — phone_number - телефонный номер кому будет проигрываться оповещение
     * - ivrName  - имя голосового меню
     */
    public function callWithInteractiveVoiceResponse($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('calls/call-with-interactive-voice-response');

        return ($result['status'] === 'success');
    }
}
