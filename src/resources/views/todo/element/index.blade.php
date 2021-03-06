@foreach ($elements as $element)
    <form
        method="POST"
        action="{{ route('todo.elements.toggle', ['event' => $event, 'todo' => $todo->id, 'element' => $element]) }}"
        id="{{ $element->id }}__form"
    >
        @csrf

        <label for="{{ $element->id }}__submit">
            <input
                type="checkbox"
                @if($element->checked)
                checked
                @endif
                onclick="document.getElementById('{{ $element->id }}__form').submit()"
            >
            {{ $element->description }}
        </label>
        <input type="submit" id="{{ $element->id }}__submit" style="display:none">

        @if($event->isAuthor())
            <a href="{{ route('todo.elements.destroy', ['event' => $event, 'todo' => $todo->id, 'element' => $element]) }}">x</a>
        @endif

        @if($element->checked)
            {{ $element->checker() }}
        @endif
    </form>
@endforeach


@if($event->isAuthor())
    <form method="POST" action="{{ route('todo.elements.add', ['event' => $event, 'todo' => $todo->id]) }}">
        @csrf

        <label for="element-name">Ajouter une tache</label>
        <input id="element-name" type="text" name="name">

        <input type="submit">
    </form>
@endif
