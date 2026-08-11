<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios = [
            [
                'name' => 'Manicure',
                'description' => 'Servicio de manicure tradicional para el cuidado de las uñas.',
                'price' => 13000,
                'duration' => 60,
                'status' => 1,
            ],
            [
                'name' => 'Manicure Permanente',
                'description' => 'Esmaltado de larga duración con secado en lámpara LED.',
                'price' => 35000,
                'duration' => 60,
                'status' => 1,
            ],
            [
                'name' => 'Pedicure Spa',
                'description' => 'Tratamiento completo de pies con exfoliación y masaje.',
                'price' => 45000,
                'duration' => 90,
                'status' => 1,
            ],
            [
                'name' => 'Uñas Acrílicas (Set Completo)',
                'description' => 'Extensiones de uñas duraderas con acabado natural o diseño.',
                'price' => 120000,
                'duration' => 120,
                'status' => 1,
            ],
            [
                'name' => 'Baño de Acrílico',
                'description' => 'Refuerzo de acrílico sobre la uña natural para evitar quiebres.',
                'price' => 60000,
                'duration' => 60,
                'status' => 1,
            ],
            [
                'name' => 'Retiro de Permanente',
                'description' => 'Remoción segura del esmalte sin dañar la uña natural.',
                'price' => 15000,
                'duration' => 30,
                'status' => 1,
            ],
            [
                'name' => 'Diseño a Mano Alzada',
                'description' => 'Arte personalizado dibujado directamente sobre tus uñas.',
                'price' => 5000,
                'duration' => 20,
                'status' => 1,
            ],
        ];

        foreach ($servicios as $servicio) {
            Service::updateOrCreate(
                ['name' => $servicio['name']],
                $servicio
            );
        }
    }
}