<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialist; 

class SpecialistSeeder extends Seeder
{
    public function run(): void
    {
        $especialistas = [
            ['name' => 'Ana Gómez', 'specialty' => 'Manicure y Pedicure'],
            ['name' => 'Laura Díaz', 'specialty' => 'Depilación facial y corporal'],
            ['name' => 'Sofía Martínez', 'specialty' => 'Masajes relajantes y terapéuticos'],
            ['name' => 'Valentina Ruiz', 'specialty' => 'Limpieza facial y tratamientos faciales'],
        ];

        foreach ($especialistas as $experta) {
            Specialist::updateOrCreate(
                ['name' => $experta['name']], 
                $experta
            );
        }
    }
}
