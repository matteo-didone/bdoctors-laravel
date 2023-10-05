<?php

namespace Database\Seeders;

use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $specialties = Specialty::all();

        User::whereHas('userDetail')->get()->each(function ($user) use ($faker, $specialties) {
            $randomSpecialties = $specialties->random($faker->numberBetween(1, 3))->pluck('id');
            $user->specialties()->attach($randomSpecialties);
        });
    }
}
