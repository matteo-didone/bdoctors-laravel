<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i<10; $i++) {
            $newMessage = new Message();
            $newMessage->user_id = 2; // Specifically for the admin user
            $newMessage->guest_name = $faker->firstName();
            $newMessage->guest_email = $faker->email();
            $newMessage->content = $faker->paragraph(4);
            $newMessage->created_at = $faker->dateTimeBetween('-1 month', 'now'); // Random timestamp within the last month
            $newMessage->save();
        }

        $users = User::where('id', '!=', 2)->get(); // Get all users excluding the admin

        for ($i=0; $i<150; $i++) {
            $newMessage = new Message();

            $user = $users->random(); // Pick a random user from the non-admin users

            $newMessage->user_id = $user->id;
            $newMessage->guest_name = $faker->firstName();
            $newMessage->guest_email = $faker->email();
            $newMessage->content = $faker->paragraph(2);
            $newMessage->created_at = $faker->dateTimeBetween('-1 month', 'now'); // Random timestamp within the last month
            $newMessage->save();
        }
    }
}
