<?php
namespace App\Conversations;

use App\messengerUser as database;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Conversations\Conversation;

use BotMan\BotMan\Messages\Incoming\Answer as BotManAnswer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question as BotManQuestion;

class FirstConversation extends Conversation
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
                ->getFirstName()->response,.' 👋');
        $this->bot->typesAndWaits(1);
        $this->askSaveData();
    }

        private function askSaveData()
    {
        $question = BotManQuestion::create('Бот сохраняет ваше имя, идентификатор чата и ответы на некоторые вопросы, чтобы сделать обучение максимально персональным. В любой момент вы можете удалить свои данные, используя команду /deletedata.')
            ->addButtons([
                Button::create('Разрешить')
                    ->value('yes'),
                Button::create('Не разрешать')
                    ->value('no'),
            ]);

        $this->ask($question, function (BotManAnswer $answer) {
            switch ($answer->getValue()) {
                case 'yes':
                    $user = BotManQuestion::saveUser($this->bot->getUser(),  $this->bot->getText(), $this->bot->getId(), $this->userCorrectAnswers);
                    $this->say("✓");

                    return $this->bot->startConversation(new WelcomeConversation());
                case 'no':
                    return $this->say('Если решите поменять свое решение, используйте команду /datasave');
                default:
                    return $this->repeat('Извините, не понимаю команду. Пожалуйста, используйте кнопки.');
            }
        });
    }

    private function exit() {
        $db = new database();
        $db->id_chat    = $this->bot->getUser()->getId();
        $db->name       = $this->response[0];
        $db->response   = $this->response[1];
        $db->save();
    }
}