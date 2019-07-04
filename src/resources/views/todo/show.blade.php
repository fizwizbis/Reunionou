<h1>
    {{ $todo['name'] }}
</h1>

@include('todo.element.index')

<a href="{{ route('todo.destroy', ['event' => $event, 'todo' => $todo->id]) }}">Supprimer la liste</a><br>
<a href="{{ route('todo.update', ['event' => $event, 'todo' => $todo->id]) }}">Renommer la liste</a>
