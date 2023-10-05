<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Illuminate\Http\Request;

class ProdutController extends Controller
{
    public function index(Request $request)
    {
        $sponsorships=Sponsorship::all();

        return response()->json($sponsorships, 200);
    }

}
