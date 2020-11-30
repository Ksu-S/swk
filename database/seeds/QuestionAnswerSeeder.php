<?php

use App\Answer;
use App\Question;
use Illuminate\Database\Seeder;

class QuestionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::truncate();
        Answer::truncate();
        $questionAndAnswers = $this->getData();

        $questionAndAnswers->each(function ($question) {

            $createdQuestion = Question::create([
                'text' => $question['question'],
                'points' => $question['points'],
            ]);

            collect($question['answers'])->each(function ($answer) use ($createdQuestion) {
                Answer::create([
                    'question_id' => $createdQuestion->id,
                    'text' => $answer['text'],
                    'correct_one' => $answer['correct_one'],
                    'explanation' => $answer['explanation'],
                ]);
            });

        });
    }

    private function getData()
    {
        return collect([
            [
                'question' => 'How old are you?',
                'points' => '1',
                'answers' => [
                    ['text' => 'I have 25', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'I am 25', 'correct_one' => true, 'explanation' => 'потому что'],
                    ['text' => 'I have 25 years', 'correct_one' => false, 'explanation' => 'потому что', 'explanation' => 'потому что'],
                    ['text' => 'I am 25 years', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => '_____ you remember to buy some bread?',
                'points' => '1',
                'answers' => [
                    ['text' => 'Have', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'Did', 'correct_one' => true, 'explanation' => 'потому что 2'],
                    ['text' => 'Should', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'You don\'t need to buy _____ to drink',
                'points' => '1',
                'answers' => [
                    ['text' => 'some', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'a food', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'anything', 'correct_one' => true, 'explanation' => 'потому что 3'],
                ],
            ],
            [
                'question' => 'They were _____ after the long jorney, so they went to bed',
                'points' => '1',
                'answers' => [
                    ['text' => 'hungry', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'tiring', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'tired', 'correct_one' => true, 'explanation' => 'потому что 4'],
                ],
            ],
            [
                'question' => 'Cann you tell me the _____ to the reilway station?',
                'points' => '1',
                'answers' => [
                    ['text' => 'road', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'way', 'correct_one' => true, 'explanation' => 'потому что'],
                    ['text' => 'direction', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'My holiday starts _____ the last day of summer',
                'points' => '1',
                'answers' => [
                    ['text' => 'on', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'at', 'correct_one' => true, 'explanation' => 'потому что'],
                    ['text' => 'in', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'She is very busy these days, she _____ for her exams',
                'points' => '1',
                'answers' => [
                    ['text' => 'study', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'studied', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'is studying', 'correct_one' => true, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'When I arrived at the cafe my friends _____',
                'points' => '1',
                'answers' => [
                    ['text' => 'lived', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'have already left', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'were leaving', 'correct_one' => true, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'If you want to take this TV back to the shop you will need _____',
                'points' => '1',
                'answers' => [
                    ['text' => 'the check', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'the invoice', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'the receipt', 'correct_one' => true, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'When I was a child I used to keep a _____',
                'points' => '1',
                'answers' => [
                    ['text' => 'dairy', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'notes', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'diary', 'correct_one' => true, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'He always _____ small things.',
                'points' => '1',
                'answers' => [
                    ['text' => 'loose', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'waste', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'loses', 'correct_one' => true, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'This dog is _____',
                'points' => '1',
                'answers' => [
                    ['text' => 'mine', 'correct_one' => true, 'explanation' => 'потому что'],
                    ['text' => 'my', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'it', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
            #https://www.study.ru/courses/pre-intermediate/be-going-to
            [
                'question' => 'He told his friends that he _____ to buy a new car.',
                'points' => '2',
                'answers' => [
                    ['text' => 'was going', 'correct_one' => true, 'explanation' => 'потому что'],
                    ['text' => 'going', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'is going', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
        ]);
    }
}