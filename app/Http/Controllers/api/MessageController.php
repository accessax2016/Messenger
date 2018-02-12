<?php

namespace App\Http\Controllers\api;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\ChatEvent;

class MessageController extends Controller
{
    public function getMessagesOfRoom($room_id)
    {
        return Message::with('user')->where('room_id', $room_id)->get();
    }

    public function sendMessage(Request $request)
    {
    	$message = Message::create($request->all());
        $response = Message::with('user')->findOrFail($message->id);

        broadcast(new ChatEvent($response))->toOthers();

        return $response;
    }
}
