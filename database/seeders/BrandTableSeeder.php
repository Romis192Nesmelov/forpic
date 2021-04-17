<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Brand;

class BrandTableSeeder extends Seeder
{

    public function run()
    {
        $data = [
            ['image' => 'images/logo_ford.png','name' => 'Ford'],
            ['image' => 'images/logo_landrover.png','name' => 'Landrover']
        ];
        
        foreach ($data as $brand) {
            Brand::create($brand);
        }
    }
}