<?php

namespace App\Http\Controllers;

use App\Todo;
use App\TodoElement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function index(): View
    {
        return view('todo.index', ['todos' => Todo::all()]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('todo.edit');
        }

        $todo = new Todo();
        $todo->event_id = 0;

        $todo->name = $_POST['name'];
        $todo->save();

        return redirect(route('todo.index'));
    }

    public function show(Todo $todo)
    {
        return view('todo.show', ['todo' => $todo, 'elements' => $todo->elements()->get()]);
    }

    public function update(Request $request, Todo $todo)
    {
        if ($request->isMethod('get')) {
            return view('todo.edit', ['name' => $todo->name]);
        }

        $todo->update(['name' => $_POST['name']]);

        return redirect(route('todo.show', $todo));
    }

    public function destroy(Todo $todo)
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

        return redirect(route('todo.index'));
    }
}
