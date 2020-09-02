<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
use BotMan\Drivers\Telegram\TelegramDriver;

class BotManController extends Controller
{
    
    public function handle()
    {
        //info('Incoming call', \request()->all());

        $botman = app('botman');

        try {
            $botman->listen();
        } catch (\Exception $e) {
            info('error Incoming call', \request()->all());
            info('error catched: '.$e->getMessage());
            $fromId = request()->all()['message']['from']['id'] ?? request()->all()['callback_query']['from']['id'];

            $botman->say('🚧 Что-то пошло не так, как планировалось. 😕 Приносим извинения за неудобства.', $fromId, TelegramDriver::class);
            $botman->say('Пожалуйста, попробуйте запустить снова командой /start или свяжитесь со мной https://t.me/swksupport.',
                $fromId, TelegramDriver::class);

        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php
     *
     * @param BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }
}