<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Action;

class ActionsTableSeeder extends Seeder
{

    public function run()
    {
        for ($i=1;$i<=10;$i++) {
            Action::create([
                'image' => 'images/actions/action'.$i.'.jpg',
                'name' => 'Акция №'.$i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus rhoncus egestas. In elementum arcu at dui imperdiet fermentum. Aenean non elementum ipsum. Curabitur sit amet pretium arcu, eget viverra nulla. Phasellus facilisis condimentum blandit. Proin in interdum velit. Mauris vitae blandit urna, eget varius quam. In efficitur laoreet augue, vel tincidunt felis aliquet vitae. Vestibulum vitae mauris bibendum, congue neque ut, egestas libero. Donec venenatis egestas mauris. Etiam placerat purus dui, vel feugiat dui congue vel. Sed a diam ac tellus tristique tempor. In placerat imperdiet eros.',
                'active' => 1
            ]);
        }
    }
}