<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentTableSeeder extends Seeder
{

    public function run()
    {
        $data = [
            [
                'head' => 'О компании',
                'text' => '<p>Автосервис Forpic является небольшим клубным автосервисом «для своих».</p><p>Forpic открылся в 2005 году. Основным направлением деятельности стал ремонт и постгарантийное обслуживание автомобилей различных марок. Годы работы подтолкнули к решению сфокусироваться на двух марках - Land Rover и Ford. Специализированное оборудование, запасные части, опыт мастеров - все это заточено под ремонт и техническое обслуживание этих двух марок автомобилей.</p><p>Forpic - это клуб любителей Land Rover и Ford. <b>Мастера</b>, работающие у нас - профессионалы <b>со стажем работы с этими марками от 15 лет.</b></p><p>Качество работ, цены ниже дилеров, квалифицированные консультации и доверительная обстановка притягивают к нам клиентов не только из Текстильщиков и Печатников, ВАО и ЮВАО, но и со всей Москвы. Производственные мощности СТО, на сегодняшний день, позволяют распахнуть двери для новых любителей английских и американских машин. Мы знаем, любим и восхищаемся двумя марками автомобилей. Кроме ремонта и обслуживания автомобилей компания имеет большой ассортимент оригинальных запасных частей и качественных аналогов. Некоторые детали, которые есть у нас, очень трудно отыскать во всем городе.</p>'
            ]
        ];
        
        foreach ($data as $item) {
            Content::create($item);
        }
    }
}