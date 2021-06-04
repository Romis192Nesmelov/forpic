<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Action;
use App\Models\ActionOption;

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
                'note' => 'Все диагностики не включают в себя слесарные работы',
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
        
        foreach (['Ходовая диагностика','Компьютерная диагностика','Диагностика тормозной системы'] as $option) {
            ActionOption::create([
                'description' => $option,
                'action_id' => 2
            ]);
        }
    }
}