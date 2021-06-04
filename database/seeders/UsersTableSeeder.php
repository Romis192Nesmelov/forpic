<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $data = [
            ['email' => 'romis.nesmelov@gmail.com', 'password' => bcrypt('apg192')],
            ['email' => 'Forpic@forpic.ru', 'password' => bcrypt('forpic')],
        ];
        
        foreach ($data as $user) {
            User::create($user);
        }
    }
}