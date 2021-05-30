<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Reason;

class ReasonsTableSeeder extends Seeder
{

    public function run()
    {
        $data = [
            ['icon' => 'icon-hour-glass', 'description' => '15 лет опыта на рынке'],
            ['icon' => 'icon-hammer-wrench', 'description' => 'Опытные мастера'],
            ['icon' => ' icon-certificate', 'description' => 'Сертифицированный техцентр'],
            ['icon' => 'icon-stars', 'description' => 'Гарантия на все виды работ и запчасти'],
            ['icon' => 'icon-thumbs-up3', 'description' => 'Специалисты с многолетним опытом'],
            ['icon' => 'icon-bowtie', 'description' => 'Индивидуальный подход к каждому клиенту'],
        ];
        
        foreach ($data as $item) {
            Reason::create($item);
        }
    }
}