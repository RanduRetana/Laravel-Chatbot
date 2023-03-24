<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ChatController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_message' => 'required',
        ]);

        $message = new Message();
        $message->user_message = $request->input('user_message');
        $message->bot_message = "Respuesta del chatbot: " . $request->input('user_message');
        $message->save();

        return response()->json(['bot_message' => $message->bot_message]);
    }
}
