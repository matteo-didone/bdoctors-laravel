<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VoteController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $validation = Validator::make($data,
        [
            'review_id' => ['required'],
            'vote' => ['required'],
        ]);
        if( $validation->fails() ){
            return response()->json([
                'success' => false,
                'errors' => $validation->errors(),
            ]);
        }
        $vote = Vote::create($data);
        return response()->json([
            'success'=> true,
            'vote' => $vote,
        ]);
    }
}
