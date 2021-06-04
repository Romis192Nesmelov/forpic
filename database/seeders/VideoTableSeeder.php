<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoTableSeeder extends Seeder
{

    public function run()
    {
        $data = [
            ['link' => 'exAI4x19kUU', 'description' => 'Схема проезда в тех центр Форпик по Волгоградскому проспекту от МКАД'],
            ['link' => 'p3nq5pYUOsU', 'description' => 'Схема проезда в тех центр Форпик по Волгоградскому проспекту из центра'],
            ['link' => 'XQKpbpM9U-Y', 'description' => 'Схема проезда в тех центр Форпик от метро Печатники'],
        ];
        
        foreach ($data as $item) {
            Video::create($item);
        }
    }
}