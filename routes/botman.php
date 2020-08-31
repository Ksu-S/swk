<?php

use BotMan\BotMan\BotMan;
use App\Conversations\QuizConversation;
use App\Conversations\HighscoreConversation;

$botman = resolve('botman');

$botman->hears('Hi', function (BotMan $bot) {
    $bot->reply('Hello!');
});

$botman->hears('/start', function (BotMan $bot) {
    $bot->startConversation(new QuizConversation());
});

$botman->hears('/highscore|highscore', function (BotMan $bot) {
    $bot->startConversation(new HighscoreConversation());
})->stopsConversation();