@include('poll.show')

Résultat : <br>

@foreach($answers as $answer)
    - {{ $answer->text }} {{ $answer->score }} <br>
@endforeach
