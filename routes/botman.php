<?php

use BotMan\BotMan\BotMan;
use App\Conversations\QuizConversation;

$botman = resolve('botman');

$botman->hears('Hi', function (BotMan $bot) {
    $bot->reply('Hello!');
});

$botman->hears('/start', function (BotMan $bot) {
    $bot->startConversation(new QuizConversation());
});