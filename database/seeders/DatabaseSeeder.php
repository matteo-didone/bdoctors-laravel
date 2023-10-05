<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            UserDetailSeeder::class,
            SpecialtySeeder::class,
            UserSpecialtySeeder::class,
            MessageSeeder::class,
            ReviewSeeder::class,
            VoteSeeder::class,
            SponsorshipSeeder::class,
            UserSponsorshipSeeder::class,
        ]);
    }
}
