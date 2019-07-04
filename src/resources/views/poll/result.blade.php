@extends('poll.show')

@section('poll_content')

    @foreach($answers as $answer)
        <div class="box @if(in_array($answer->id, $userVotes))has-text-weight-bold @endif">
            {{ $answer->text }}
            {{ $answer->score }}
        </div>
    @endforeach

@endsection
