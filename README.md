# Клиент для Binotel API

[![Latest Stable Version](https://poser.pugx.org/denostr/binotel-api/v/stable)](https://packagist.org/packages/denostr/binotel-api)
[![Total Downloads](https://poser.pugx.org/denostr/binotel-api/downloads)](https://packagist.org/packages/denostr/binotel-api)
[![Latest Unstable Version](https://poser.pugx.org/denostr/binotel-api/v/unstable)](https://packagist.org/packages/denostr/binotel-api)
[![License](https://poser.pugx.org/denostr/binotel-api/license)](https://packagist.org/packages/denostr/binotel-api)


## Установка

Рекомендуется установка через composer:

```
$ composer require denostr/binotel-api
```

или добавить

```
"denostr/binotel-api": "~0.1"
```

в файл `composer.json`

## Использование

```
try {
    $client = new \denostr\Binotel\Client('KEY', 'SECRET');
    
    $settings = $client->settings;
    $voiceFiles = $settings->listOfVoiceFiles();

    print_r($voiceFiles);

} catch (\denostr\Binotel\Exception $e) {
    printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
}
```

## Документация

* [`Stats`](docs/rest/stats.md) - модель для получения статистики по звонками;
* [`Customers`](docs/rest/customers.md) - модель для работы с клиентами;
* [`Calls`](docs/rest/calls.md) - модель для работы со звонками;
* [`Settings`](docs/rest/settings.md) - модель для получения настроек виртуальной АТС;
