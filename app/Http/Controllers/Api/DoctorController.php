<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $totalUsersCount = User::count();
        $specialtyNames = $request->input('specialties');
        $minRating = $request->input('minRating');
        $minReviewCount = $request->input('minReviewCount');
        $now = Carbon::now()->toDateTimeString();

        $sponsorshipSubquery = DB::table('sponsorship_user')
            ->select('user_id', DB::raw('MAX(sponsorship_start_date) as latest_sponsorship_start_date'))
            ->where('sponsorship_start_date', '<=', $now)
            ->where('sponsorship_end_date', '>=', $now)
            ->groupBy('user_id');


        $query = User::with([
            'userDetail',
            'activeSponsorships',
            'specialties',
            'messages',
            'reviews' => function($query) {
                $query->with('vote');
            },
        ])
            ->has('userDetail')
            ->where('users.id', '!=', 1) // Removing only ADMIN ID 1 
            ->select('users.*', DB::raw('AVG(votes.vote) as avg_rating'))
            ->leftJoin('reviews', 'users.id', '=', 'reviews.user_id')
            ->leftJoin('votes', 'reviews.id', '=', 'votes.review_id')
            ->leftJoinSub($sponsorshipSubquery, 'latest_sponsorship', function ($join) {
                $join->on('users.id', '=', 'latest_sponsorship.user_id');
            })
            ->groupBy('users.id');

        // Filter by specialties (case-insensitive)
        if (!empty($specialtyNames)) {
            $specialtiesArray = explode(',', $specialtyNames);

            // Get all specialty IDs that match our criteria
            $specialtyIds = Specialty::whereIn(DB::raw('LOWER(name)'), array_map('strtolower', $specialtiesArray))
                ->pluck('id')
                ->toArray();

            // Then filter doctors based on those specialty IDs
            $query->whereHas('specialties', function ($query) use ($specialtyIds) {
                $query->whereIn('id', $specialtyIds);
            });
        }

        // Filter by minimum rating
        if (!empty($minRating)) {
            $query->having(DB::raw('ROUND(avg_rating, 2)'), '>=', round($minRating, 2));
        }

        if (!empty($minReviewCount) && is_numeric($minReviewCount)) {
            $query->having(DB::raw('COUNT(reviews.id)'), '>=', $minReviewCount);
        }

        $query->orderByDesc('latest_sponsorship.latest_sponsorship_start_date')
            ->orderBy('users.id');  // Add more orderBy as needed

        // Paginate the results
        $users = $query->paginate(15);

        return response()->json([
            'success' => true,
            'totalUsers' => $totalUsersCount,
            'results' => $users,
        ]);
    }

    public function show(string $slug)
    {
        $user = User::with('userDetail', 'activeSponsorships', 'specialties', 'messages', 'reviews.vote')->findOrFail($slug);

        return response()->json(
            [
                'success' => true,
                'results' => $user
            ]
        );
    }
}
