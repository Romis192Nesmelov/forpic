<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ImagesTableSeeder extends Seeder
{

    public function run()
    {
        for ($i=0;$i<10;$i++) {
            Image::create([
                'path' => 'images/placeholder.jpg',
                'active' => 1
            ]);
        }
    }
}