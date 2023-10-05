<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtiesController extends Controller
{
    public function index(Request $request)
    {
        $specialties = Specialty::withCount('users')->get();

        return response()->json([
            'success' => true,
            'results' => $specialties,
        ]);
    }
}
