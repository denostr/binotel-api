# Клиент для Binotel API


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

## Модели

* `Stats` - модель для получения статистики по звонками;
* `Customers` - модель для работы с клиентами;
* `Calls` - модель для работы со звонками;
* `Settings` - модель для получения настроек виртуальной АТС;
