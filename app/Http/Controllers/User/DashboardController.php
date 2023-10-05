<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display of dashboard panel.
     */
    public function index()
    {
        $user = Auth::user();

        // Fetch latest 5 messages and reviews
        $messages = $user->messages()->latest()->take(5)->get();
        $reviews = $user->reviews()->latest()->take(5)->get();

        // Fetch total count of messages and reviews
        $totalMessagesCount = $user->messages()->count();
        $totalReviewsCount = $user->reviews()->count();

        $averageVote = $user->reviews()->with('vote')->get()->avg(function($review) {
            return $review->vote->vote ?? 0;
        });

        return view('user.dashboard', compact('user', 'messages', 'reviews', 'averageVote', 'totalMessagesCount', 'totalReviewsCount'));
    }

    /**
     * Display of all messages.
     */
    public function messagesIndex()
    {
        $user = Auth::user();
        $messages = $user->messages()->latest()->paginate(10);

        return view('user.messages', compact('user', 'messages'));
    }

    /**
     * Display of all reviews.
     */
    public function reviewsIndex()
    {
        $user = Auth::user();
        $reviews = Auth::user()->reviews()->latest()->paginate(10);

        return view('user.reviews', compact('user', 'reviews'));
    }

    /**
     * Display of various stats.
     */
    public function statsIndex()
    {
        $user = Auth::user();

        $reviews = $user->reviews()->latest()->take(10)->get();
        $messages = $user->messages;

        $totalMessagesCount = $user->messages()->count();
        $totalReviewsCount = $user->reviews()->count();

        $averageVote = $user->reviews()->with('vote')->get()->avg(function($review) {
            return $review->vote->vote ?? 0;
        });

        return view('user.stats',  compact('user', 'messages', 'reviews', 'averageVote', 'totalMessagesCount', 'totalReviewsCount'));
    }

    /**
     * Display of various sponsorships plans.
     */
    public function sponsorshipsIndex()
    {
        $user = Auth::user();
        $sponsors = Sponsorship::all();
        $hasActiveSponsorship = $user->activeSponsorships()->exists(); // Check if user has active sponsorships
        return view('user.sponsorships', compact('sponsors', 'hasActiveSponsorship'));
    }

}
