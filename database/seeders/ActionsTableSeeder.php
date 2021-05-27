<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Action;

class ActionsTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'image' => 'images/actions/action1.jpg',
                'name' => 'У нас день рождения - вам 15% скидка на ТО!',
                'description' => 'В честь нашего 15-летия мы предоставляем Вам пятнадцати-процентную скидку на тех-обслуживание.',
                'active' => 1
            ],
            [
                'image' => 'images/actions/action2.jpg',
                'name' => 'Давайте знакомиться!',
                'description' => 'При первом обращении в наш сервис, мы дарим бесплатную диагностику. Успейте записаться!',
                'active' => 1
            ],
            [
                'image' => 'images/actions/action3.jpg',
                'name' => 'Давайте знакомиться!',
                'description' => 'При первом обращении в наш сервис, мы дарим 20% скидку на любой вид ремонта. Успейте записаться!',
                'active' => 1
            ],
        ];

        foreach ($data as $item) {
            Action::create($item);
        }
    }
}