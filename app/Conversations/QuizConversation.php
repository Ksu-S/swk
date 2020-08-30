<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class QuizConversation extends Conversation
{


    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->showInfo();
    }
    protected $questionCount = 0;


private function showInfo()
{
    $this->say('You will be shown '.$this->questionCount.' questions about Laravel. Every correct answer will reward you with a certain amount of points. Please keep it fair, and don\'t use any help. All the best! 🍀');
}
}
