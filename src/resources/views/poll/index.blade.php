<div class="box">
    @foreach($polls as $poll)
        -
        @include('poll.element.resume')
        <br>
    @endforeach

    @if($polls->count() === 0 && !$event->isAuthor())
        Aucuns sondages
    @endif

    @if($event->isAuthor())
        <a href="{{ route('poll.create', $event) }}">Créer un sondage</a>
    @endif

</div>
