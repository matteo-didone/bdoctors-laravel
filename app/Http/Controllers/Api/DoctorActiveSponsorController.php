<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorActiveSponsorController extends Controller
{
    public function indexActiveSponsor()
    {
        // Filter users with active sponsorships
        $users = User::whereHas('activeSponsorships')->with([
            'userDetail',
            'activeSponsorships',
            'specialties',
        ])->has('userDetail')->get();

        $totalUsersCount = $users->count();

        return response()->json([
            'success' => true,
            'totalUsers' => $totalUsersCount,
            'results' => $users,
        ]);
    }
}
