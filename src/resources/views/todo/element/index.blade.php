@foreach ($elements as $element)
    <form
        method="POST"
        action="{{ route('todo.elements.toggle', ['todo' => $todo->id, 'element' => $element]) }}"
        id="{{ $element->id }}__form"
    >
        @csrf

        - <label for="{{ $element->id }}__submit">
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

        <a href="{{ route('todo.elements.destroy', ['todo' => $todo->id, 'element' => $element]) }}">x</a>

        @if($element->checked)
            {{ $element->checker() }}
        @endif
    </form>
@endforeach


<form method="POST" action="{{ route('todo.elements.add', ['todo' => $todo->id]) }}">
    @csrf

    <label for="element-name">Ajouter une tache</label>
    <input id="element-name" type="text" name="name">

    <input type="submit">
</form>
