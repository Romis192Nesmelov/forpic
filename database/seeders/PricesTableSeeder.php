<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Price;

class PricesTableSeeder extends Seeder
{

    public function run()
    {
        for ($b=1;$b<=2;$b++) {
            for ($i=0;$i<50;$i++) {
                Price::create([
                    'name' => 'Цена на что-то №'.($i+1),
                    'value' => rand(1000,50000),
                    'brand_id' => $b
                ]);
            }
        }
    }
}