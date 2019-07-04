@extends('layouts.app')

@section('content')
    <div class="container">

        <nav><a href="{{ route('event.detail', $event) }}">{{ $event->title }}</a> > Votes/Sondages</nav>

        <div>
            <h1>
                <span class="title">{{ $poll->title }}</span>
            </h1>

            @if($remainingTime)
                <p class="subtitle">{{ $remainingTime }}</p>
            @endif

            <p>{{ $poll->text }}</p>
        </div>

        <br>

        <div class="columns">
            <div class="column is-8">
                <div id="poll__content">
                    @yield('poll_content')
                </div>
            </div>
            @if($event->isAuthor())
                <div class="column">

                </div>
            @endif
        </div>

    </div>
@endsection
