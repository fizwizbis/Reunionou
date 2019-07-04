<?php

namespace App\Http\Controllers;

use App\Event;
use App\Todo;
use App\TodoElement;
use Exception;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create(Request $request, Event $event)
    {
        if ($request->isMethod('get')) {
            return view('todo.edit');
        }

        $todo = new Todo();
        $todo->event_id = $event->id;

        $todo->name = $_POST['name'];
        $todo->save();

        return redirect(route('eventDetail', $event));
    }

    public function show(Event $event, Todo $todo)
    {
        return view('todo.show', ['event' => $event, 'todo' => $todo, 'elements' => $todo->elements()->get()]);
    }

    public function update(Request $request, Event $event, Todo $todo)
    {
        if ($request->isMethod('get')) {
            return view('todo.edit', ['name' => $todo->name]);
        }

        $todo->update(['name' => $_POST['name']]);

        return redirect(route('todo.show', [$event, $todo]));
    }

    public function destroy(Event $event, Todo $todo)
    {
        $todo->elements()->each(function ($element) {
            try {
                /** @var TodoElement $element */
                $element->delete();
            } catch (Exception $exception) {
                die($exception);
            }
        });

        try {
            $todo->delete();
        } catch (Exception $exception) {
            die($exception);
        }

        return redirect(route('todo.index', [$event, $todo]));
    }
}
