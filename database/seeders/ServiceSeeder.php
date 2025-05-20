<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name'        => 'Corte Masculino',
            'description' => 'Corte de cabelo tradicional com tesoura e máquina.',
            'time'        => 30,
            'price'       => 3000, // R$30,00
        ]);

        Service::create([
            'name'        => 'Barba Completa',
            'description' => 'Modelagem e hidratação da barba com toalha quente.',
            'time'        => 25,
            'price'       => 2500,
        ]);

        Service::create([
            'name'        => 'Corte Degradê + Barba',
            'description' => 'Corte estilo degradê com finalização da barba.',
            'time'        => 45,
            'price'       => 5000,
        ]);

        Service::create([
            'name'        => 'Sobrancelha com Navalha',
            'description' => 'Design da sobrancelha com uso de navalha.',
            'time'        => 10,
            'price'       => 1000,
        ]);

        Service::create([
            'name'        => 'Corte Infantil',
            'description' => 'Corte de cabelo para crianças até 10 anos.',
            'time'        => 30,
            'price'       => 2000,
        ]);
    }
}
