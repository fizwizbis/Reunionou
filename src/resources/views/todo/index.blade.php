<div class="box">
    @foreach($todos as $todo)
        -
        @include('todo.element.resume')
        <br>
    @endforeach

    @if($event->isAuthor())
        <a href="{{ route('todo.create', $event) }}">Créer une liste</a>
    @endif
</div>
