<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Price;

class PricesTableSeeder extends Seeder
{

    public function run()
    {
        for ($i=0;$i<30;$i++) {
            Price::create([
                'name' => 'Цена на что-то №'.($i+1),
                'value' => rand(1000,50000)
            ]);
        }
    }
}