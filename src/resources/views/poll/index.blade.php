@foreach($polls as $poll)
    -
    @include('poll.element.resume')
    <br>
@endforeach


<a href="{{ route('poll.create') }}">Créer un sondage</a>
