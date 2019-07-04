@include('poll.show')

Résultat : <br>

@foreach($answers as $answer)
    -
    {{ $answer->text }}
    {{ $answer->score }}
    @if(in_array($answer->id, $userVotes))
        ✔️
    @endif
    <br>
@endforeach
