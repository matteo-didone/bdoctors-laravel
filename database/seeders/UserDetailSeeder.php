<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        {
            $userIds = User::all()->pluck('id');
            $performances = Config::get('performancesList.performances');

            foreach ($userIds as $userId) {
                $newDoctorDetail = new UserDetail();
                $newDoctorDetail->user_id = $userId;

                // Generate a random doctor tag
                $doctorTags = ['Dr.', 'Dr.ssa', 'Dottor', 'Dottor.ssa'];
                $randomTag = $doctorTags[array_rand($doctorTags)];

                $newDoctorDetail->doctor_tag = $randomTag;
                $newDoctorDetail->birth_date = $faker->date();
                $newDoctorDetail->phone_number = $faker->phoneNumber();
                $newDoctorDetail->work_address = $faker->address();
                $newDoctorDetail->personal_address = $faker->address();

                $randomPerformance = $performances[array_rand($performances)];
                $newDoctorDetail->performance = $randomPerformance;

                $newDoctorDetail->profile_picture;
                $newDoctorDetail->cv_file;

                if ($userId == 1) {
                    $newDoctorDetail->cv_file = 'uploads/cvs/default-profile-cv.pdf';
                } elseif ($userId == 2) {
                    $newDoctorDetail->cv_file = 'uploads/cvs/default-profile-cv.pdf';
                } else {
                    $newDoctorDetail->cv_file;  // Or adjust this logic based on your requirements
                }

                $newDoctorDetail->save();
            }
        }
    }
}
