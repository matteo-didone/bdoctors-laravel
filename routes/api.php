<?php

use App\Http\Controllers\Api\DoctorActiveSponsorController;
use App\Http\Controllers\Api\DoctorController as ApiDoctorController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\Order\ProdutController;
use App\Http\Controllers\Api\RatingAVGCountController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SpecialtiesController;
use App\Http\Controllers\Api\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/doctors', [ApiDoctorController::class, 'index'])->name('api.doctors.index');
Route::get('/doctors/{name}', [ApiDoctorController::class, 'show'])->name('api.doctors.show');

Route::get('/active-sponsorship', [DoctorActiveSponsorController::class, 'indexActiveSponsor'])->name('api.doctorsActiveSponsor');

//routes for braintree payment
Route::get('sponsorships', [ProdutController::class, 'index'])->name('api.sponsorship');

// routes for mail
Route::post('/message-form' , [MessageController::class, 'store'])->name('api.message-form');

// Routes for reviews and votes
Route::post('/review-form' , [ReviewController::class, 'store'])->name('api.review-form');
Route::post('/vote-rating' , [VoteController::class, 'store'])->name('api.vote-rating');

// Api exposure for all sepcialties
Route::get('/specialties', [SpecialtiesController::class, 'index'])->name('api.specialties');
Route::get('/rating-counts', [RatingAVGCountController::class, 'userRatingCounts']);
