<a href="{{ route('todo.show', ['event' => $event, 'todo' => $todo->id]) }}">
    {{ $todo->name }}
</a> {{ $todo->progress() }}
