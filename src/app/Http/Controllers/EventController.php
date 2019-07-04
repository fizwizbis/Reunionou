<?php


namespace App\Http\Controllers;


use App\Event;
use App\Poll;
use App\Todo;
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

    public function detail(Event $event)
    {
        if ($event->isSubscribed() || $event->isAuthor()) {
            $todos = Todo::all()->where('event_id', $event->id);
            $polls = Poll::all()->where('event_id', $event->id);
            return view('event.panel', ['event' => $event, 'todos' => $todos, 'polls' => $polls]);
        }
        return view('event.detail', ['event' => $event]);
    }

    public function manage(Event $event) {
        $todos = Todo::all()->where('event_id', $event->id);
        $polls = Poll::all()->where('event_id', $event->id);
        return view('event.manage', ['event' => $event, 'todos'=> $todos, 'polls' => $polls]);
    }

    public function create(Request $request) {
        if ($request->isMethod('get')) {
            return view('event.create');
        }
        $event = new Event();

        $event->id  = \Str::uuid();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->token = Str::random(16);
        $event->author = Auth::user()->id;
        $event->address = $request->address;
        $event->public = $request->public;
        $event->free = $request->free;
        $event->max_subs = $request->maxSubs;
        $event->price = $request->price ?? 0;
        try {
            $event->save();
            return redirect()->route('event.index')->with('success', 'Evènement créé avec succès');
        } catch (Exception $e) {
            return back()->with('error', 'Evènement créé avec non succès');
        }
    }

    public function change(Request $request, Event $event)
    {
        if ($request->isMethod('get')) {
            return view('event.create');
        }

        $event->title = $request->title;
        $event->description = $request->description;
        $event->address = $request->address;
        $event->public = $request->public;
        try {
            $event->save();
            return redirect()->route('event.index')->with('success', 'Evènement créé avec succès');
        } catch (Exception $e) {
            return back()->with('error', 'Evènement créé avec non succès');
        }
    }

    public function search(Request $request)
    {
        $events = Event::where('title', 'LIKE', '%'.$request->name.'%')->get();
        return view('event.search', ['events' => $events]);
    }

    public function subscribe(Event $event)
    {
        $event->subscribers()->attach(Auth::user()->id);
        return redirect(route('event.detail', [$event]));;
    }
}
