<div class="box">
    @foreach($todos as $todo)
        -
        <a href="{{ route('todo.show', ['todo' => $todo->id]) }}">
            {{ $todo->name }}
        </a> {{ $todo->progress() }}
        <br>
    @endforeach

    <a href="{{ route('todo.create', $event) }}">Créer une liste</a>
</div>
