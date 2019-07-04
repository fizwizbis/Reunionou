@foreach($polls as $poll)
    -
    <a href="{{ route('poll.show', $poll->slug) }}">{{ $poll->title }}</a>
    <br>
@endforeach


<a href="{{ route('poll.create') }}">Créer un sondage</a>
