<h2 align="center">Laravel Telegram Bot Logging</h2>
<p align="center">Send logs to Telegram chat via Telegram bot. Inspired by <a href="https://github.com/grkamil/laravel-telegram-logging"> https://github.com/grkamil/laravel-telegram-logging</a></p>

## Requirement

- PHP 8.0 above
- Laravel 8 or higher

## Install

```bash
composer require muhamadzain/laravel-telegram-log
```

## Configurations

Please define Telegram Bot Credentials and chat id as environment parameters by modifying `.env` on your project path

```dotenv
TELEGRAM_BOT_TOKEN=null
TELEGRAM_CHAT_ID=null
TELEGRAM_LOGGER_TEMPLATE=null
TELEGRAM_OPTIONS=[]
```

Create new logging channel by modifying **config/logging.php** file

```php
'telegram' => [
    'driver' => 'custom',
    'via'    => TelegramLog\TelegramLogger::class,
    'level'  => 'debug',
]
```

Or if your default log channel is a stack, you can add it to the stack channel like this

```php
'stack' => [
    'driver' => 'stack',
    'channels' => ['single', 'telegram'],
]
```

By default `LOG_CHANNEL` will be set into `stack` so you need to set default logger on env after setting up configurations above

```dotenv
LOG_CHANNEL=telegram
```

Publish config file and views to override

```shell
php artisan vendor:publish --provider "TelegramLog\TelegramServiceProvider"
```

## Create bot

For using this plugin, you need to create telegram bot

1. Go to [@BotFather](https://t.me/botfather) in the Telegram
2. Send `/newbot`
3. Set up name and bot-name for your bot.
4. Get token and add it to your .env file (it is written above)
5. Go to your bot and send `/start` message

## Change log template at runtime

1. Change config for template.

```php
config(['telegram-logger.template'=>'laravel-telegram-logging::custom'])
```

2. Use `Log` as usual

# Lumen support

To make it work with Lumen, you need also run two steps:

1. Place config/telegram-logger.php file with following code:

```php
<?php

return [
    // Telegram logger bot token
    'token' => env('TELEGRAM_LOGGER_BOT_TOKEN'),

    // Telegram chat id
    'chat_id' => env('TELEGRAM_LOGGER_CHAT_ID'),
];
```

2. Uncomment `$app->withFacades();` and configure the file `$app->configure('telegram-logger');` at bootstrap/app.php
3. Place default Laravel/Lumen logging file to config/logging.php (to add new channel).

---

Copyright © 2023 by Muhamad Zainal Arifin
