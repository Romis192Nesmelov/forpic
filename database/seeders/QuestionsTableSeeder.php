<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Question;

class QuestionsTableSeeder extends Seeder
{

    public function run()
    {
        for ($i=1;$i<=10;$i++) {
            Question::create([
                'question' => 'А как бы сделать что-то эдакое №'.$i,
                'answer' => 'Подробный и основательный ответ на вопрос как сделать то, не знаю что №'.$i,
                'active' => 1
            ]);
        }
    }
}