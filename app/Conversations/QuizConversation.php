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
    $this->quizQuestions = Question::all()->shuffle();
    $this->questionCount = $this->quizQuestions->count();
    $this->quizQuestions = $this->quizQuestions->keyBy('id');
    $this->showInfo();
    }

	/** @var Question */
protected $quizQuestions;

/** @var integer */
protected $userPoints = 0;

/** @var integer */
protected $userCorrectAnswers = 0;

/** @var integer */
protected $questionCount = 0; // we already had this one

/** @var integer */
protected $currentQuestion = 1;


private function showInfo()
{
    $this->say('You will be shown '.$this->questionCount.' questions about Laravel. Every correct answer will reward you with a certain amount of points. Please keep it fair and don\'t use any help. All the best! 🍀');
    $this->checkForNextQuestion();
}

private function checkForNextQuestion()
{
    if ($this->quizQuestions->count()) {
		return $this->askQuestion($this->quizQuestions->first());
	}

	$this->showResult();
}
private function askQuestion(Question $question)
{
    $questionTemplate = BotManQuestion::create($question->text);

    foreach ($question->answers->shuffle() as $answer) {
        $questionTemplate->addButton(Button::create($answer->text)->value($answer->id));
    }

    $this->ask($questionTemplate, function (BotManAnswer $answer) use ($question) {
        $this->quizQuestions->forget($question->id);

        $this->checkForNextQuestion();
    });
}

private function showResult()
{
    $this->say('Finished 🏁');
}
}
