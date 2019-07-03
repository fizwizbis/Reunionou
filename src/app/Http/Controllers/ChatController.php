<?php

namespace App\Http\Controllers;

use App\Event;
use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * ChatsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch($eventId)
    {
        return Message::with(["user", "event"])->where("event_id", $eventId)->get();
    }

    public function send($eventId, Request $request)
    {
        $user = Auth::user();
        $event = Event::find($eventId);
        $message = $user->messages()->create([
            'body' => $request->input('body'),
            'event_id' => $event->id,
        ]);

        broadcast(new MessageSent($user, $message, $event))->toOthers();

        return ['status' => 'Message envoyé!'];
    }
}
