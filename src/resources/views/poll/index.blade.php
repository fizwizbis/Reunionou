<div class="box">
    @foreach($polls as $poll)
        -
        @include('poll.element.resume')
        <br>
    @endforeach


    <a href="{{ route('poll.create', $event) }}">Créer un sondage</a>
</div>
