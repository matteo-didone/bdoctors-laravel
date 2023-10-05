<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorShips = [
            [
                'name' => 'Base',
                'price' => 2.99,
                'duration'=> 24,
            ],
            [
                'name' => 'Premium',
                'price' => 5.99,
                'duration' => 48,
            ],
            [
                'name' => 'Platino',
                'price' => 9.99,
                'duration' => 144,
            ],

        ];

            foreach ($sponsorShips as $sponsorShip ) {
                $newSponsorShip = new Sponsorship();
                $newSponsorShip->plan_name = $sponsorShip['name'];
                $newSponsorShip->price = $sponsorShip['price'];
                $newSponsorShip->duration_time= $sponsorShip['duration'];
                $newSponsorShip->save();
            }
        }
    }
