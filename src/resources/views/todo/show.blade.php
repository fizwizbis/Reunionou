<h1>
    {{ $todo['name'] }}
</h1>

@include('todo.element.index')

<a href="{{ route('todo.destroy', ['todo' => $todo->id]) }}">Supprimer la liste</a><br>
<a href="{{ route('todo.update', ['todo' => $todo->id]) }}">Renommer la liste</a>
