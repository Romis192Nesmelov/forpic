<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Document;

class DocumentsTableSeeder extends Seeder
{

    public function run()
    {
        for ($i=0;$i<10;$i++) {
            Document::create([
                'name' => 'Какой-то документ',
                'path' => 'images/placeholder.jpg',
                'active' => 1
            ]);
        }
    }
}