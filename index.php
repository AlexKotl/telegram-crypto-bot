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


$bot->command('start', function ($message) use ($bot) {
    $answer = 'Hello there :)';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});

$bot->run();