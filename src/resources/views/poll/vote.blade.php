@include('poll.show')

<form
    method="POST"
    action="{{ route('poll.vote', ['event' => $event, 'poll' => $poll->slug]) }}"
    id="{{ $poll->slug }}"
>
    @CSRF
    @foreach($poll->answers()->get() as $answer)
        <input type="radio" name="vote" id="{{ $answer->id }}" value="{{ $answer->id }}">
        <label for="{{ $answer->id }}">{{ $answer->text }}</label>
        <br>
    @endforeach

    <input type="submit">
</form>
