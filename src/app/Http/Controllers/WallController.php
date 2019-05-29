<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class WallController extends Controller
{
    /**
     * Index method for the Wall Controller
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $messages = Message::all();
        return view('wall/index')->withMessages($messages);
    }

    /**
     * Write a message in the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function write(Request $request)
    {
        $message = new Message();
        $message->message = $request->input('message');
        $message->id_author = \Auth::id();
        $message->save();
        return redirect()->route("wallIndex");
    }

    public function delete(Request $request)
    {
        $message = Message::find($request->id_message);
        if($message->id_author == \Auth::id()){
            $message->delete();
            $request->session()->flash("message", "message deleted");
            return redirect()->route("wallIndex");
        }
        $request->session()->flash("message", "Illegal operation");
        return redirect()->route("wallIndex");
    }
}
