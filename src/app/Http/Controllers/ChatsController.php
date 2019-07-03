<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    /**
     * ChatsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chat');
    }

    public function fetch()
    {
        return Message::with('user')->get();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function send(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'body' => $request->input('body'),
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message envoyé!'];
    }
}
