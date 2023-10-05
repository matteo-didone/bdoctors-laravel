<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingAVGCountController extends Controller
{
    public function userRatingCounts()
    {
        $criteria = [
            ["min" => 4.0, "max" => 5.0, "label" => "showFourStarAbove"],
            ["min" => 3.0, "max" => 5.0, "label" => "showThreeStarAbove"],
            ["min" => 2.0, "max" => 5.0, "label" => "showTwoStarAbove"],
            ["min" => 1.0, "max" => 5.0, "label" => "showOneStarAbove"],
        ];

        $results = [];

        foreach ($criteria as $criterion) {
            $count = User::join('reviews', 'users.id', '=', 'reviews.user_id')
                        ->join('votes', 'reviews.id', '=', 'votes.review_id')
                        ->groupBy('users.id')
                        ->havingRaw('AVG(votes.vote) BETWEEN ? AND ?', [$criterion["min"], $criterion["max"]])
                        ->get(['users.id', DB::raw('AVG(votes.vote) as average_vote')])
                        ->count();

            $results[] = ["label" => $criterion["label"], "count" => $count];
        }

        return response()->json([
            'success' => true,
            'results' => $results,
        ]);
    }
}
