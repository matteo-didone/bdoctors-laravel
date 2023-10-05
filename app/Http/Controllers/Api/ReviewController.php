<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $validation = Validator::make($data,
        [
            'user_id' => ['required'],
            'guest_name' => ['required'],
            'guest_email' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
        ]);

        if( $validation->fails() ){
            return response()->json([
                'success' => false,
                'errors' => $validation->errors(),
            ]);
        }

        $review = Review::create($data);

        return response()->json([
            'success'=> true,
            'review' => $review,
        ]);
    }
}
