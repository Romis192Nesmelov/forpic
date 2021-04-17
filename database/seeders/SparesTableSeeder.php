<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Spare;

class SparesTableSeeder extends Seeder
{

    public function run()
    {
        for ($b=1;$b<=2;$b++) {
            for ($i=0;$i<50;$i++) {
                Spare::create([
                    'name' => 'Какая-то запчасть №'.($i+1),
                    'code' => rand(100,999),
                    'value' => rand(500,50000),
                    'brand_id' => $b
                ]);
            }
        }
    }
}