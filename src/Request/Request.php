<?php

namespace denostr\Binotel\Request;

use denostr\Binotel\Exception;
use denostr\Binotel\NetworkException;

/**
 * Класс для выполнения запросов
 *
 * @package denostr\Binotel\Request
 * @author denostr <4deni.kiev@gmail.com>
 * @link https://github.com/denostr/binotel-api
 */
class Request
{
    /**
     * Выполняем запрос
     *
     * @param string $url
     * @return mixed
     * @throws Exception
     * @throws NetworkException
     */
    public function request($url)
    {
        $params = $this->parameters;
        $data = $params->getPostList();
        $data['signature'] = $this->getSignature($data);
        $data['key'] = $params->getAuth('key');

        $url = $params->getAuth('apiHost') . $params->getAuth('apiVersion') .'/'. $url .'.'. $params->getAuth('apiFormat');
        $data = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($params->getAuth('disableSSLChecks')) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Length: ' . mb_strlen($data),
            'Content-Type: application/json'
        ));

        if ($params->hasProxy()) {
            curl_setopt($ch, CURLOPT_PROXY, $params->getProxy());
        }

        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        $error = curl_error($ch);
        $errno = curl_errno($ch);

        curl_close($ch);

        if ($result === false && !empty($error)) {
            throw new NetworkException($error, $errno);
        }

        return $this->parseResponse($result, $info);
    }

    /**
     * Парсим ответ
     *
     * @param mixed $response
     * @param mixed $info
     * @return mixed
     * @throws Exception
     */
    public function parseResponse($response, $info)
    {
        $result = json_decode($response, true);

        if ($result['status'] !== 'success') {
            throw new Exception('Can`t get response: ' . $response, $info['http_code']);
        }

        return $result;
    }

    /**
     * Формируем подпись
     *
     * @param array $params
     * @return string
     */
    public function getSignature(array $params)
    {
        ksort($params);
        $signature = md5($this->parameters->getAuth('secret') . json_encode($params));

        return $signature;
    }
}
