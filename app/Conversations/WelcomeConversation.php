<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class WelcomeConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->welcomeUser();
    }

    private function welcomeUser()
    {
        $this->say('Привет, '.$this->bot->getUser()
                ->getFirstName().' 👋');
        $this->bot->typesAndWaits(1);
        $this->askIfReady();
    }

    private function askIfReady()
    {
        $question = Question::create('Добро пожаловать в бот, для изучения английского языка. Используй команду about, чтобы узнать больше. Для начала давай пройдем тест на твой уровень знания английского языка.')
            ->addButtons([
                Button::create('Да 😎')
                    ->value('yes'),
                Button::create('Не сейчас 😐')
                    ->value('no'),
            ]);

        $this->ask($question, function (Answer $answer) {
            $this->bot->typesAndWaits(1);
            if ($answer->getValue() === 'yes') {
                $this->say('Отлично!');
                $this->bot->typesAndWaits(1);

                return $this->bot->startConversation(new QuizConversation());
            }

            $this->say('Ок, может в другой раз.');
            $this->say('Если вы измените свое мнение, вы можете начать тест в любое время, используя команду /test или набрав «test».');
        }, [
            'parse_mode' => 'Markdown',
        ]);
    }
}