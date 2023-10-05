<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $validation = Validator::make($data,
        [
            'user_id' => ['required'],
            'guest_name' => ['required'],
            'guest_email' => ['required'],
            'content' => ['required'],
        ]);

        if( $validation->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validation->errors(),
            ]);
        }

        $message = Message::create($data);
        Mail::to('admin@gmail.com')->send(new NewContact($message));
        return response()->json([
            'success'=> true,
        ]);
    }
}
