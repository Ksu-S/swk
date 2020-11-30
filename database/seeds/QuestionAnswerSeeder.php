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
            [
                'question' => 'The new _LazyCollection_ feature is using PHP\'s ... under the hood.',
                'points' => '10',
                'answers' => [
                    ['text' => 'Generators', 'correct_one' => true, 'explanation' => 'потому что'],
                    ['text' => 'Alternator', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'Reflections', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'By using the Notification facade, we are actually calling the...',
                'points' => '20',
                'answers' => [
                    ['text' => 'NotificationSender class', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'ChannelManager class', 'correct_one' => true, 'explanation' => 'потому что'],
                    ['text' => 'NotificationManager class', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'A project Taylor Otwell never released was called...',
                'points' => '15',
                'answers' => [
                    ['text' => 'Laravel Ignition', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'Laravel Plume', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'Laravel Cloud', 'correct_one' => true, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'You can use a Laravel controller without extending the "base" controller?',
                'points' => '15',
                'answers' => [
                    ['text' => 'False', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'True', 'correct_one' => true, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'You use a database transaction with Laravel for two queries. The first one calls the create method on a model. The second one fails. When will the "_created event_" be triggered?',
                'points' => '30',
                'answers' => [
                    ['text' => 'After the first query', 'correct_one' => true, 'explanation' => 'потому что'],
                    ['text' => 'After the last query', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'Never, because no model in the DB', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'What is the largest PHP file in the Laravel framework.(regarding line numbers)',
                'points' => '20',
                'answers' => [
                    ['text' => 'Support Facades Bus', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'Database Query Builder', 'correct_one' => true, 'explanation' => 'потому что'],
                    ['text' => 'Support Collection', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'How many Spatie packages are in Laravel\'s core?',
                'points' => '15',
                'answers' => [
                    ['text' => '0', 'correct_one' => true, 'explanation' => 'потому что'],
                    ['text' => '1', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => '2', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'What does the following command do? "_php artisan serve_"',
                'points' => '10',
                'answers' => [
                    ['text' => 'It compiles your frontend assets.', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'It spins up a local web server.', 'correct_one' => true, 'explanation' => 'потому что'],
                    ['text' => 'It publishes every vendor configuration.', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'Which integrated command caches all (cachable) resources at once?',
                'points' => '20',
                'answers' => [
                    ['text' => 'php artisan cache', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'php artisan cache:all', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'php artisan optimize', 'correct_one' => true, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'Why is the Laravel core components namespaced "_Illuminate_"?',
                'points' => '20',
                'answers' => [
                    ['text' => 'Taylor is an Illuminati himself', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'Abigail told Taylor', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'Codename for Laravel 4', 'correct_one' => true, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'Who designed the _Laracon US 2019_ website?',
                'points' => '15',
                'answers' => [
                    ['text' => 'Steve Schoger', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'Adam Wathan', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'Jack McDade', 'correct_one' => true, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'Who\'s behind the video course Laravel Core Adventures?',
                'points' => '15',
                'answers' => [
                    ['text' => 'Miguel Piedrafita', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'Christoph Rumpel', 'correct_one' => true, 'explanation' => 'потому что'],
                    ['text' => 'Caleb Porzio', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
            [
                'question' => 'When joining a table to an Eloquent query, how does Laravel handle the _joined table columns?_',
                'points' => '35',
                'answers' => [
                    ['text' => 'Includes them all', 'correct_one' => true, 'explanation' => 'потому что'],
                    ['text' => 'Doesn\'t include them', 'correct_one' => false, 'explanation' => 'потому что'],
                    ['text' => 'Resolves conflicts automatically', 'correct_one' => false, 'explanation' => 'потому что'],
                ],
            ],
        ]);
    }
}