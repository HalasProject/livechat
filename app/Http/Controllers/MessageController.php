<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function all($id){
       return Message::where('from',$id)->orWhere('to',$id)->get();
    }

    public function add(Request $request){
        
        $Message = Message::create([
            'from' => Auth()->user()->id,
            'to' => $request->contact_id,
            'content' => $request->content
        ]);

        return response()->json($Message);
    }
}
