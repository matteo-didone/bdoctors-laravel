<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $newUser = new User();
        $newUser->name = 'Admin';
        $newUser->slug = Str::of($newUser->name)->slug('-');
        $newUser->email = 'admin@gmail.com';
        $newUser->password = Hash::make('admin12345');
        $newUser->save();
        $newUser->slug = Str::of("$newUser->id " . $newUser->name)->slug('-');
        $newUser->save();

        $newUser = new User();
        $newUser->name = 'Francesco Ruggeri';
        $newUser->slug = Str::of($newUser->name)->slug('-');
        $newUser->email = 'general.francescoruggeri@gmail.com';
        $newUser->password = Hash::make('Estate55');
        $newUser->save();
        $newUser->slug = Str::of("$newUser->id " . $newUser->name)->slug('-');
        $newUser->save();

        for ($i = 0; $i < 49; $i++) {
            $newUser = new User();
            $newUser->name = $faker->firstName() . ' ' . $faker->lastName();
            $newUser->slug = Str::of($newUser->name)->slug('-');
            $newUser->email = $faker->email();
            $newUser->password = Hash::make($faker->password());
            $newUser->save();
            $newUser->slug = Str::of("$newUser->id " . $newUser->name)->slug('-');
            $newUser->save();
        }
    }
}
