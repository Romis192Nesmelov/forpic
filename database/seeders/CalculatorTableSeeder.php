<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Calculator;

class CalculatorTableSeeder extends Seeder
{

    public function run()
    {
        $data = [
            ['name' => 'diagnostics', 'value' => 2000],
            ['name' => 'replace_front_brake_pads', 'value' => 5000],
            ['name' => 'replace_back_brake_pads', 'value' => 5000],
            ['name' => 'replace_front_brake_disks', 'value' => 10000],
            ['name' => 'replace_back_brake_disks', 'value' => 10000],
            ['name' => 'replace_friction', 'value' => 20000],
            ['name' => 'replace_oil_filter', 'value' => 3000],
            ['name' => 'replace_air_filter_engine', 'value' => 2000],
            ['name' => 'replace_air_filter_salon', 'value' => 1500],
            ['name' => 'replace_oil_engine', 'value' => 15000],
            ['name' => 'replace_oil_gear_box', 'value' => 25000],
            ['name' => 'replace_brake_fluid', 'value' => 18000],
            ['name' => 'replace_antifreeze', 'value' => 16000],
            ['name' => 'replace_lamp', 'value' => 6000],
            ['name' => 'headlight_adjustment', 'value' => 2000],
            ['name' => 'tire_fitting', 'value' => 3000],
            ['name' => 'charge_air_condition', 'value' => 8000],
            ['name' => 'antibacterial_treatment' , 'value'=> 5000]
        ];
        
        foreach ($data as $item) {
            Calculator::create($item);
        }
    }
}