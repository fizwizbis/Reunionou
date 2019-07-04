@extends('poll.show')

@section('poll_content')
    <form
        method="POST"
        action="{{ route('poll.vote', ['event' => $event, 'poll' => $poll->slug]) }}"
        id="{{ $poll->slug }}"
    >
        @CSRF
        @foreach($poll->answers()->get() as $answer)
            <div class="box">
                <input type="radio" name="vote" id="{{ $answer->id }}" value="{{ $answer->id }}">
                <label for="{{ $answer->id }}">{{ $answer->text }}</label>
            </div>
        @endforeach

        <input type="submit">
    </form>

@endsection
