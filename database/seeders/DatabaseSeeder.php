<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DocumentsTableSeeder::class);
        $this->call(PricesTableSeeder::class);
        $this->call(ActionsTableSeeder::class);
    }

}
