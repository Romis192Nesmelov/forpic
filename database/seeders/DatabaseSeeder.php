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
        $this->call(UsersTableSeeder::class);
        $this->call(CalculatorTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(PricesTableSeeder::class);
        $this->call(SparesTableSeeder::class);
        $this->call(ActionsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
    }
}
