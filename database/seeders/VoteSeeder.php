<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviewIds = Review::all()->pluck('id');

        foreach ($reviewIds as $reviewId) {
            $newVote = new Vote();
            $newVote->review_id = $reviewId;
            $newVote->vote = rand(1, 5);
            $newVote->save();
        }
    }
}
