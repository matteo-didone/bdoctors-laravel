<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsorship;
use App\Models\User;
use Carbon\Carbon;

class UserSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorshipPlans = Sponsorship::all();

        // User IDs to seed sponsorships for
        $userIds = [5, 3, 22, 44, 38, 29, 17];

        foreach ($userIds as $userId) {
            $user = User::find($userId);

            if ($user) {
                $selectedSponsorship = $sponsorshipPlans->random();

                $start_date = Carbon::now();
                $end_date = $start_date->copy()->addHours($selectedSponsorship->duration_time);

                $user->sponsorships()->attach($selectedSponsorship->id, [
                    'sponsorship_start_date' => $start_date,
                    'sponsorship_end_date' => $end_date
                ]);
            }
        }
    }
}
