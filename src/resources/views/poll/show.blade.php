<h1>{{ $poll->title }}</h1>

@if($remainingTime)
    {{ $remainingTime }}
@endif


@if(isset($poll->text))
    <p>{{ $poll->text }}</p>
@endif
