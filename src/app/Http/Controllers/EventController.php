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
        return view('event.index', ['events' => $events]);
    }

    public function detail($id)
    {
        $event = Event::find($id);
        if ($event->isSubscribed()) {
            return view('event.panel', ['event' => $event]);
        }
        return view('event.detail', ['event' => $event]);
    }

    public function createForm() {
        return view('event.create');
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

    public function search(Request $request)
    {
        $events = Event::where('title', 'LIKE', '%'.$request->name.'%')->get();
        return view('event.search', ['events' => $events]);
    }

    public function subscribe($id)
    {
        $event = Event::find($id);
        $event->subscribers()->attach(Auth::user()->id);
        return back();
    }
}
