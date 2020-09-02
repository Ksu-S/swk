<?php

use BotMan\BotMan\BotMan;
use App\Conversations\QuizConversation;
use App\Http\Middleware\TypingMiddleware;
use App\Conversations\WelcomeConversation;
use App\Conversations\PrivacyConversation;
use App\Conversations\HighscoreConversation;
use App\Http\Middleware\PreventDoubleClicks;
use App\Conversations\NewsConversation;

$botman = resolve('botman');

//$typingMiddleware = new TypingMiddleware();
//$botman->middleware->sending($typingMiddleware);

$botman->middleware->captured(new PreventDoubleClicks);

$botman->hears('Hi', function (BotMan $bot) {
    $bot->reply('Hello!');
});

$botman->hears('/start', function (BotMan $bot) {
    $bot->startConversation(new WelcomeConversation());
})->stopsConversation();

$botman->hears('/news|news|новости', function (BotMan $bot) {
    $bot->startConversation(new NewsConversation());
})->stopsConversation();

$botman->hears('start|/startQuiz', function (BotMan $bot) {
    $bot->startConversation(new QuizConversation());
})->stopsConversation();

$botman->hears('/highscore|highscore', function (BotMan $bot) {
    $bot->startConversation(new HighscoreConversation());
})->stopsConversation();

$botman->hears('/about|about', function (BotMan $bot) {
    $bot->reply('LaravelQuiz is a project by Christoph Rumpel. Find out more about it on https://christoph-rumpel.com');
})->stopsConversation();

$botman->hears('/deletedata|deletedata', function (BotMan $bot) {
    $bot->startConversation(new PrivacyConversation());
})->stopsConversation();


