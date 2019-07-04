<?php

namespace App\Http\Controllers;

use App\Event;
use App\Todo;
use App\TodoElement;
use Auth;
use Exception;
use Illuminate\Support\Str;

class TodoElementController extends Controller
{
    public function create(Event $event, Todo $todo)
    {
        $element = new TodoElement();

        $element->id = Str::Uuid();
        $element->todo_id = $todo->id;
        $element->description = $_POST['name'];
        $element->save();

        return redirect(route('todo.show', [$event, $todo]));
    }

    public function destroy(Event $event, Todo $todo, TodoElement $element)
    {
        try {
            $element->delete();
        } catch (Exception $exception) {
            die($exception);
        }

        return redirect(route('todo.show', [$event, $todo]));
    }

    public function toggle(Event $event, Todo $todo, TodoElement $element)
    {
        $element->checked = !$element->checked;

        if ($element->checked) {
            $element->user_id = Auth::id();
        }

        $element->save();

        return redirect(route('todo.show', [$event, $todo]));
    }
}
