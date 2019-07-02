@foreach($todos as $todo)
    -
    <a href="{{ route('todo.show', ['todo' => $todo->id]) }}">
        {{ $todo->name }}
    </a> {{ $todo->progress() }}
    <br>
@endforeach

<a href="{{ route('todo.create') }}">Créer une liste</a>
