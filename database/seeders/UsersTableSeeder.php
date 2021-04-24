<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $data = [
            ['email' => 'romis.nesmelov@gmail.com', 'password' => bcrypt('fuckingpassword')],
            ['email' => 'Forpic@forpic.ru', 'password' => bcrypt('forpic')],
        ];
        
        foreach ($data as $user) {
            User::create($user);
        }
    }
}