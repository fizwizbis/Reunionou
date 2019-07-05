<div class="box">
    @foreach($todos as $todo)
        -
        @include('todo.element.resume')
        <br>
    @endforeach

    @if($todos->count() === 0 && !$event->isAuthor())
        Aucunes listes
    @endif

    @if($event->isAuthor())
        <a href="{{ route('todo.create', $event) }}">Créer une liste</a>
    @endif
</div>
