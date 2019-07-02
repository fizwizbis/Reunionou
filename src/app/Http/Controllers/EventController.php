<?php


namespace App\Http\Controllers;


use App\Event;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('eventIndex', ['events' => $events]);
    }

    public function detail($id)
    {
        $event = Event::find($id);
        return view('eventDetail', ['event' => $event]);
    }

    public function createForm() {
        return view('eventCreate');
    }

    public function create(Request $request) {
        $event = new Event();

        $event->id  = \Str::uuid();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->token = Str::random(16);
        $event->author = Auth::user()->id;
        $event->address = $request->address;
        $event->public = $request->public;
        try {
            $event->save();
            return redirect()->route('eventIndex')->with('success', 'Evènement créé avec succès');
        } catch (Exception $e) {
            return back()->with('error', 'Evènement créé avec non succès');
        }

    }
}
