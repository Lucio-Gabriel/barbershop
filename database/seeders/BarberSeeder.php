<?php

namespace Database\Seeders;

use App\Models\Barber;
use Illuminate\Database\Seeder;

class BarberSeeder extends Seeder
{
    public function run(): void
    {
        Barber::create([
            'id'     => 1,
            'name'   => 'Lúcio Azevedo',
            'email'  => 'lucio@barbearia.com',
            'avatar' => 'https://i.pravatar.cc/150?img=1',
            'rating' => 4.8,
            'active' => true,
        ]);

        Barber::create([
            'id'     => 2,
            'name'   => 'Carlos Fernandes',
            'email'  => 'carlos@barbearia.com',
            'avatar' => 'https://i.pravatar.cc/150?img=2',
            'rating' => 4.5,
            'active' => true,
        ]);

        Barber::create([
            'id'     => 3,
            'name'   => 'Eduardo Lima',
            'email'  => 'eduardo@barbearia.com',
            'avatar' => 'https://i.pravatar.cc/150?img=3',
            'rating' => 4.7,
            'active' => true,
        ]);

        Barber::create([
            'id'     => 4,
            'name'   => 'Felipe Souza',
            'email'  => 'felipe@barbearia.com',
            'avatar' => 'https://i.pravatar.cc/150?img=4',
            'rating' => 4.6,
            'active' => true,
        ]);
    }
}
