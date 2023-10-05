<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            'Chirurgia generale', 'Chirurgia pediatrica', 'Ginecologia ed ostetricia',
            'Allergologia', 'Urologia', 'Neurochirurgia', 'Oftalmologia',
            'Nefrologia', 'Medicina legale', 'Genetica medica',
            'Medicina del lavoro', 'Dermatologia', 'Gastroenterologia',
            'Radiologia', 'Microbiologia e virologia', 'Pediatria'
        ];

        foreach ($specialties as $specialty) {
            $newSpecialty = new Specialty();
            $newSpecialty->name = $specialty;
            $newSpecialty->save();
        }
    }
}
