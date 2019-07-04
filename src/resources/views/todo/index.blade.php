<div class="box">
    @foreach($todos as $todo)
        -
        @include('todo.element.resume')
        <br>
    @endforeach

    <a href="{{ route('todo.create', $event) }}">Créer une liste</a>
</div>
