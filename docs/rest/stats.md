# Stats

Модель для работы со статистикой звонков.
****

## incomingCallsForPeriod()

Получение всех входящих звонков за выбранный период времени.

### Обязательные параметры:

#### `startTime`

Время начала выбора звонков (в формате unix timestamp).

#### `stopTime`

Время окончания выбора звонков (в формате unix timestamp).

### Пример

```
$client->stats->incomingCallsForPeriod([
	'startTime' => 1370034000,
	'stopTime' => 1370120399
]);

```

## outgoingCallsForPeriod()

Получение всех исходящих звонков за выбранный период времени.

### Обязательные параметры:

#### `startTime`

Время начала выбора звонков (в формате unix timestamp).

#### `stopTime`

Время окончания выбора звонков (в формате unix timestamp).

### Пример

```
$client->stats->outgoingCallsForPeriod([
	'startTime' => 1370034000,
	'stopTime' => 1370120399
]);

```

## callTrackingCallsForPeriod()

Получение всех CallTracking за выбранный период времени.

### Обязательные параметры:

#### `startTime`

Время начала выбора звонков (в формате unix timestamp).

#### `stopTime`

Время окончания выбора звонков (в формате unix timestamp).

### Пример

```
$client->stats->callTrackingCallsForPeriod([
	'startTime' => 1370034000,
	'stopTime' => 1370120399
]);

```

## allIncomingCallsSince()

Получение всех входящих звонков начиная с выбранного времени по настоящее.

### Обязательные параметры:

#### `timestamp`

Время начала выбора звонков (в формате unix timestamp).

### Пример

```
$client->stats->allIncomingCallsSince([
	'timestamp' => '1370034000'
]);

```

## allOutgoingCallsSince()

Получение всех исходящих звонков начиная с выбранного времени по настоящее.

### Обязательные параметры:

#### `timestamp`

Время начала выбора звонков (в формате unix timestamp).

### Пример

```
$client->stats->allOutgoingCallsSince([
	'timestamp' => '1370034000'
]);

```

## onlineCalls()

Получение звонков которые сейчас в онлайне.

### Пример

```
$client->stats->onlineCalls();

```

## listOfCallsPerDay()

Получение всех звонков за день.

### Обязательные параметры:

#### `dayInTimestamp`

День (в формате unix timestamp, при отсутствии этого параметра звонки буду взяты за сегодня).

### Пример

```
$client->stats->listOfCallsPerDay([
	'dayInTimestamp' => mktime(0, 0, 0, 11, 25, 2015)
]);

```

## listOfCallsForPeriod()

Получение всех звонков за выбранный период времени.

### Обязательные параметры:

#### `startTime`

Время начала выбора звонков (в формате unix timestamp).

#### `stopTime`

Время окончания выбора звонков (в формате unix timestamp).

### Пример

```
$client->stats->listOfCallsForPeriod([
	'startTime' => 1370034000,
	'stopTime' => 1370120399
]);

```

## listOfCallsByInternalNumberForPeriod()

Получение всех звонков сотрудника за выбранный период времени, по его внутреннему номеру.

**Внимание: период не более 7 дней.**

### Обязательные параметры:

#### `internalNumber`

Внутренний номер сотрудника.

#### `startTime`

Время начала выбора звонков (в формате unix timestamp).

#### `stopTime`

Время окончания выбора звонков (в формате unix timestamp).

### Пример

```
$client->stats->listOfCallsByInternalNumberForPeriod([
	'internalNumber' => '901',
	'startTime' => 1370034000,
	'stopTime' => 1370120399
]);

```

## listOfLostCallsToday()

Получение пропущенных звонков за сегодня.

### Пример

```
$client->stats->listOfLostCallsToday();

```

## historyByNumber()

Получение всех звонков по номеру телефона.

### Обязательные параметры:

#### `number`

Номер или номера в массиве.

### Пример

```
$client->stats->historyByNumber([
	'number' => ['0443334023', '0443334444']
]);

```


## historyByCustomerId()

Получение всех звонков по идентификатору клиента.

### Обязательные параметры:

#### `customerID`

Идентификатор клиента или идентификаторы клиентов в массиве.

### Пример

```
$client->stats->historyByCustomerId([
	'customerID' => '6611',
]);

```

## recentCallsByInternalNumber()

Получение недавних звонков по внутреннему номеру сотрудника.

**Внимание: звонки за последние 2 недели и не более 50 звонков.**

### Обязательные параметры:

#### `internalNumber`

внутренний номер сотрудника

### Пример

```
$client->stats->recentCallsByInternalNumber([
	'internalNumber' => '901',
]);

```

## callDetails()

Получение информации о звонке по идентификатору.

### Обязательные параметры:

#### `generalCallID`

Идентификатор звонка или массив c идентификаторами звонков.

### Пример

```
$client->stats->callDetails([
	'generalCallID' => ['2255713', '2256039', '2252553']
]);

```

## callRecord()

Получение ссылки на запись разговора.

**Внимание: время жизни ссылки на запись разговора 15 минут.**

### Обязательные параметры:

#### `callID`

Идентификатор записи разговора.

### Пример

```
$client->stats->callRecord([
	'callID' => '12501059'
]);

```
