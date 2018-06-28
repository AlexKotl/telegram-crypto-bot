<?php

// check secret token
/*
if ($_REQUEST['t'] !== $config['secret_token']) {
    die('Wrong token');
}
*/

require_once 'vendor/autoload.php';
require_once 'config.php';

$bot = new \TelegramBot\Api\Client($config['bot_token']);
$keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([['/say Дай совет', '/start Поздороваться']], false);

$bot->command('start', function ($message) use ($bot, $keyboard) {
    $text = 'Привет, я Крипто-Костя. Я даю советы.';
    $bot->sendMessage($message->getChat()->getId(), $text, null, false, null, $keyboard);
});

$bot->command('say', function ($message) use ($bot, $keyboard) {
    $tips = [
        "Покупайте крипту по выгодному курсу.",
        "Делайте иксы.",
        "Спрашивайте у меня советы.",
        "Крипта это хорошо.",
        "Дайте подумать...",
    ];
    shuffle($tips);
    $bot->sendMessage($message->getChat()->getId(), "Мой совет: " . $tips[0], null, false, null, $keyboard);
});

$bot->run();
